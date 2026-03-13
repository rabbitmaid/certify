<?php

namespace App\Http\Controllers\Dashboard\Intern;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OverviewController extends Controller
{
    public function index()
    {
        return view('dashboard.intern.index', [
            'portfolioLink' => Auth::user()->intern->portfolio_link
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'portfolio_link' => ['required', "url"]
        ]);

        Intern::where('id', Auth::user()->intern->id)->update($validated);
        toast('Portfolio Link Updated', 'success');
        return back();
    }


}
