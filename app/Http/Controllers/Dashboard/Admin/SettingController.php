<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;


class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::pluck('value', 'name');

        return view('dashboard.admin.settings.index', [
            'settings' => $settings
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'matricule_prefix' => 'required|string|max:50',
            'matricule_seperator' => 'required|string|max:10',
            'authorization' => 'required|string',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

    
        // Handle logo separately
        if ($request->hasFile('logo')) {

            $logoPath = $request->file('logo')->store('settings', 'public');

            \App\Models\Setting::updateOrCreate(
                ['name' => 'logo'],
                ['value' => $logoPath]
            );
        }


       // Save other settings
        foreach ($validated as $key => $value) {

            if ($key === 'logo') continue;

            \App\Models\Setting::updateOrCreate(
                ['name' => $key],
                ['value' => $value]
            );
        }

        toast('Settings Updated!', 'success');

        return back();
    }
}
