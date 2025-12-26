<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Intern;
use App\Http\Controllers\Controller;


class InternController extends Controller
{

    public function index()
    {
        return view('dashboard.interns.index', [
            'interns' => Intern::orderByDesc('id')->paginate(5)
        ]);
    }
}
