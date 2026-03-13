<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use App\Models\InternshipBatch;
use App\Models\InternshipSession;
use Exception;
use Illuminate\Http\Request;

class InternshipBatchController extends Controller
{

    public function index(Request $request)
    {
        if($request->query('search')) {
            $search = $request->query('search');

            $internshipBatches = InternshipBatch::where('title', 'LIKE', "%$search%")
                ->orderByDesc('id')
                ->paginate(10);
        }else {
            $internshipBatches = InternshipBatch::orderByDesc('id')->paginate(10);
        }

        return view('dashboard.admin.internship-batches.index', [
            'internshipBatches' => $internshipBatches
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.internship-batches.create', [
            'internshipSessions' => InternshipSession::orderByDesc('id')->get()
        ]);
    }

    public function show(int $id)
    {  
        return view('dashboard.admin.internship-batches.show', [
            'internshipBatch' => InternshipBatch::findOrFail($id)
        ]);
    }

    public function attach(int $id)
    {
        $internshipBatch = InternshipBatch::findOrFail($id);

        return view('dashboard.admin.internship-batches.attach', [
            'internshipBatch' => $internshipBatch,
            'interns' => Intern::whereNotIn('id', $internshipBatch->interns()->pluck('interns.id')->toArray())->orderBy('id', 'desc')->get(),
            'attachedInterns' => $internshipBatch->interns()->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function attachStore(Request $request, int $id)
    {
        $validated = $request->validate([
            'intern_id' => ['required'],
        ]);

        $internshipBatch = InternshipBatch::findOrFail($id);
        $internshipBatch->interns()->attach($validated['intern_id']);

        alert()->success('Intern Added to Batch', 'You have successfully added the intern to the batch');
        return redirect()->route('internship-batch.attach', $id);
    }

    public function detach(Request $request, int $id)
    {
        $validated = $request->validate([
            'intern_id' => ['required'],
        ]);

        $internshipBatch = InternshipBatch::findOrFail($id);
        $internshipBatch->interns()->detach($validated['intern_id']);

        alert()->success('Intern Detached from Batch', 'You have successfully removed the intern from the batch');
        return redirect()->route('internship-batch.attach', $id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'internship_session_id' => ['required'],
            'title' => ['required'],
            'category' => ['nullable', 'max:100'],
            'description' => ['nullable', 'max:255']
        ]);

        InternshipBatch::create($validated);
        alert()->success('Internship Batch Created', 'You have successfully create this batch');
        return redirect()->route('internship-batch.index');

    }

    public function edit(int $id)
    {
        return view('dashboard.admin.internship-batches.edit', [
            'internshipBatch' => InternshipBatch::findOrFail($id), 
            'internshipSessions' => InternshipSession::orderByDesc('id')->get()
        ]);
    }

    public function update(Request $request, int $id)
    {
        $internshipBatch = InternshipBatch::findOrFail($id);

        $validated = $request->validate([
            'internship_session_id' => ['required'],
            'title' => ['required'],
            'category' => ['nullable', 'max:100'],
            'description' => ['nullable', 'max:255']
        ]);

        $internshipBatch->update($validated);
        alert()->success('Internship Batch Updated', 'You have successfully updated this batch');
        return redirect()->route('internship-batch.edit', $id);
    }


    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required'],
        ]);

        $internshipBatch = internshipBatch::findOrFail($validated['id']);

        try {
            $internshipBatch->delete();
            alert()->success('Internship Batch Deleted', 'You have successfully deleted this batch');
            return redirect()->route('internship-batch.index');
        }   
        catch(Exception $e) {
            alert()->error('Internship Batch Not Deleted', 'The delete request has failed');
            return redirect()->route('internship-batch.index');
        }
    }

   
}