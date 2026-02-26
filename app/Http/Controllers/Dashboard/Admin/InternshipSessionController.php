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

}