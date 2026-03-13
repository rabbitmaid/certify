<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternshipBatch;
use App\Models\InternshipSession;
use Exception;
use Illuminate\Http\Request;

class InternshipBatchController extends Controller
{

    public function index()
    {
        return view('dashboard.admin.internship-batches.index', [
            'internshipBatches' => InternshipBatch::orderByDesc('id')->paginate(10)
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