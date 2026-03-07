<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternshipSession;
use Illuminate\Http\Request;

class InternshipSessionController extends Controller
{

    public function index()
    {
        return view('dashboard.admin.internship-sessions.index', [
            'internshipSessions' => InternshipSession::orderByDesc('id')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.internship-sessions.create');
    }

    public function show(int $id)
    {  
        return view('dashboard.admin.internship-sessions.show', [
            'internshipSession' => InternshipSession::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'description' => ['nullable', 'max:255']
        ]);

        InternshipSession::create($validated);

        alert()->success('Internship Session Created', 'You have successfully create this session');

        return redirect()->route('internship-session.index');

    }

    public function edit(int $id)
    {
        return view('dashboard.admin.internship-sessions.edit', [
            'internshipSession' => InternshipSession::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id)
    {
        $internshipSession = InternshipSession::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'description' => ['nullable', 'max:255']
        ]);

        $internshipSession->update($validated);

        alert()->success('Internship Session Updated', 'You have successfully updated this session');

        return redirect()->route('internship-session.edit', $id);

    }

}