<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;


class SettingController extends Controller
{

    public function index()
    {
        return view('dashboard.admin.settings.index');
    }
}
