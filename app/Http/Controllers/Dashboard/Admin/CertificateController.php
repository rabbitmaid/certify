<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CertificateSubmission;
use App\Models\InternshipBatch;
use App\Models\Template;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateController extends Controller
{

    public function index(Request $request)
    {
        if($request->query('search')) {
            $search = $request->query('search');

            $certificates = Certificate::with(['getRecipient'])
                    ->whereHas('getRecipient', function($query) use($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhere('reference', 'LIKE', "%$search%")
                    ->orderByDesc('id')
                    ->paginate(10);

        }else {
            $certificates = Certificate::orderByDesc('id')->paginate(10);
        }

        return view('dashboard.admin.certificates.index', [
            'certificates' => $certificates
        ]);
    }

    public function submission(Request $request)
    {
        if($request->query('search')) {
            $search = $request->query('search');

            $certificateSubmissions = CertificateSubmission::with('internshipBatch')
                        ->whereHas('internshipBatch', function($query) use($search){
                            $query->where('title', 'LIKE', "%{$search}%");
                        })
                        ->orderByDesc('id')
                        ->paginate(10);

        }else {
            $certificateSubmissions = CertificateSubmission::orderByDesc('id')->paginate(10);
        }

        return view('dashboard.admin.certificates.submission', [
            'certificateSubmissions' => $certificateSubmissions
        ]);
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => ['required']
        ]);

        $submission = CertificateSubmission::findOrFail($validated['submission_id']);
        $batchInterns = $submission->internshipBatch->interns;
        $template = $submission->template->slug;


        try {
            foreach ($batchInterns as $intern) {

                // do not create multiple pdfs for same submission and same user
                $existing = Certificate::where('recipient', $intern->user_id)
                ->where('submission_id', $submission->id)
                ->first();

                if ($existing) {
                    continue; // Skip regeneration
                }

        
                $uuid = Str::uuid();

                //---
                $qrUrl = $intern->portfolio_link ?? setting('default_porfolio_link');
                
                $qrCodeApiLink = "http://api.qrserver.com/v1/create-qr-code/?data=" 
                . urlencode($qrUrl) 
                . "&size=300x300";
                
                $response = Http::get($qrCodeApiLink);

                $qrCodeFile = 'qrcodes/' . $uuid . '.png';
                Storage::disk('public')->put($qrCodeFile, $response->body());
                

                //----
                $pdf = Pdf::loadView("templates.$template.index", [
                    'name' => $intern->user->name,
                    'data' => $submission->data,
                    'uuid' =>  $uuid,
                    'authorization' => setting('authorization'),
                    'logo' => setting('logo'),
                    'qrCodeFile' => $qrCodeFile

                ])->setPaper('a4', 'landscape')->setOption(['defaultFont' => 'sans-serif']);

                $filePath = "certificates/$uuid.pdf";
                Storage::put($filePath, $pdf->output());

                Certificate::create([
                    'reference' => $uuid,
                    'submission_id' =>  $submission->id,
                    'recipient' => $intern->user->id,
                    'generator' => auth()->id(),
                    'file_path' => $filePath,
                    'data' => $submission->data,
                ]);
            }

            $submission->update([
                'status' => 'generated'
            ]);

            alert()->success('Certificates generated', 'All certificates for the selected batch generated successfully');
            return back();
        } catch (\Exception $e) {

            dd($e);

            $submission->update([
                'status' => 'failed'
            ]);

            alert()->error('Unexpected Error', 'An error occured during the certificate creation process.');
            return back();
        }
    }

    public function create()
    {
        $heading = 'Certificate <br /> <span>Of Training</span>';

        $intro = '<strong>Proudly Presented To</strong>';

        $description = 'During his Training at ESCHOSYS TECHOLOGIES, <br />he gained hands-on experience in Graphic design, web development, SEO, GitHub,<br />and Digital Marketing. He successfully applied his skills to various projects,<br />contributing to both technical and creative aspects of the company. <br />';

        $notice = '<em>This Certificate is issued to serve the purpose to which it is intended.</em>';

        $year = date('Y');


        return view('dashboard.admin.certificates.create', [
            'internshipBatches' => InternshipBatch::orderByDesc('id')->get(),
            'templates' => Template::where('is_active', 1)->orderByDesc('id')->get(),
            'heading' => $heading,
            'intro' => $intro,
            'description' => $description,
            'notice' => $notice,
            'year' => $year
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'internship_batch_id' => ['required'],
            'template_id' => ['required'],
            'heading' => ['required', 'string'],
            'intro' => ['required', 'string'],
            'year' => ['required', 'integer', 'digits:4', 'min:1900'],
            'description' => ['required', 'string', 'max:400'],
            'notice' => ['required', 'string'],
        ]);

        $data = [
            'heading' => $validated['heading'],
            'intro' => $validated['intro'],
            'year' => $validated['year'],
            'description' => $validated['description'],
            'notice' => $validated['notice']
        ];


        CertificateSubmission::create([
            'user_id' => auth()->user()->id,
            'internship_batch_id' => $validated['internship_batch_id'],
            'template_id' => $validated['template_id'],
            'data' => $data
        ]);

        alert()->success('Batch Certificate Submitted', 'You have successfully customized and created a batch certificate');

        return redirect()->route('submission.index');
    }

    public function view(Certificate $certificate)
    {
        return response()->file(storage_path('app/private/' . $certificate->file_path));
    }

    public function destroySubmission(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer']
        ]);

        $submission = CertificateSubmission::findOrFail($validated['id']);

        // If certificates exist, block deletion
        if ($submission->certificates->count() > 0) {
            alert()->error(
                'Cannot Delete',
                'This submission already has generated certificates.'
            );

            return redirect()->route('submission.index');
        }

        // Otherwise allow delete
        $submission->delete();

        alert()->success(
            'Submission Deleted',
            'You have successfully deleted the submission'
        );

        return redirect()->route('submission.index');
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer']
        ]);

        $intern = Certificate::findOrFail($validated['id']);
        $intern->delete();

        alert()->success('Certificate Deleted', 'You have successfully deleted the certificate');

        return redirect()->route('certificate.index');
    }

    public function bulkActions(Request $request)
    {
         $validated = $request->validate([
            'bulk_option' => ['required', 'string', 'in:delete'],
            'certificates.*' => ['integer', 'exists:certificates,id'],
        ]);

        if($validated['bulk_option'] === 'delete') {

            foreach($validated['certificates'] as $id)  {
                $intern = Certificate::findOrFail($id);
                $intern->delete();
            }

            alert()->success('Certificates Deleted', 'You have successfully deleted the selected certificates'); 
            return redirect()->route('certificate.index');
        }
    
        return redirect()->back();
    }
}
