<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternshipBatch;
use App\Models\InternshipSession;
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

   
}