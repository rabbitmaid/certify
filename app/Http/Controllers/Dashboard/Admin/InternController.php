<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Intern;
use App\Http\Controllers\Controller;


class InternController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.interns.index', [
            'interns' => Intern::with('user')->orderByDesc('id')->paginate(5)
        ]);
    }
}
