<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternshipSession;
use Exception;
use Illuminate\Http\Request;

class InternshipSessionController extends Controller
{

    public function index(Request $request)
    {
        if($request->query('search')) {
            $search = $request->query('search');

            $internshipSessions = InternshipSession::where('title', 'LIKE', "%$search%")
                ->orderByDesc('id')
                ->paginate(10);
        }else {
            $internshipSessions = InternshipSession::orderByDesc('id')->paginate(10);
        }

        return view('dashboard.admin.internship-sessions.index', [
            'internshipSessions' => $internshipSessions
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
            'description' => ['nullable', 'max:255'],
            'status' => ['required']
        ]);

        $internshipSession->update($validated);

        alert()->success('Internship Session Updated', 'You have successfully updated this session');

        return redirect()->route('internship-session.edit', $id);

    }


    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required'],
        ]);

        $internshipSession = InternshipSession::findOrFail($validated['id']);

        try {
            $internshipSession->delete();
            alert()->success('Internship Session Deleted', 'You have successfully deleted this session');
            return redirect()->route('internship-session.index');
        }   
        catch(Exception $e) {
            alert()->error('Internship Session Not Deleted', 'The delete request has failed');
            return redirect()->route('internship-session.index');
        }
    }
}