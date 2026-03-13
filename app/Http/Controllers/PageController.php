<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function track(Request $request)
    {
        if($request->query('reference')) {
            $reference = $request->query('reference');
            $certificate = Certificate::where('reference', $reference)->first();
            return view('pages.verify', compact('certificate'));
        }
        else {
            return view('pages.verify');
        }
    }
}