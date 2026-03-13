<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Intern;
use App\Models\Template;

class OverviewController extends Controller
{

    public function index()
    {
        return view('dashboard.admin.index', [
            'interns' => Intern::count(),
            'certificates' => Certificate::count(),
            'templates' => Template::count()
        ]);
    }

}