<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\CertificateSubmission;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function track(Request $request)
    {
        if($request->query('reference')) {
            $reference = $request->query('reference');
            $certificate = Certificate::where('reference', $reference)->first();
            return view('pages.verify', compact('certificate'));
        }
        else {
            return view('pages.verify');
        }
    }

    public function submit()
    {
        return view('pages.submit');
    }

    public function submitStore(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'idCardNumber' => ['required'],
            'portfolio_link' => ['required', 'url'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'gender' => ['required', 'in:male,female'],
            'otherInformation' => ['required', 'max:255'],
        ]);

        $data = [
            'name' => $validated['name'],
            'id_card_number' => $validated['idCardNumber'],
            'portfolio_link' => $validated['portfolio_link'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'other_information' => $validated['otherInformation'],
        ];

    
        CertificateSubmission::create([
            'type' => "individual",
            'status' => "submitted",
            'data' => $data
        ]);

        toast('You have successfully submitted your certificate request', 'success');

        return back();
    }
}