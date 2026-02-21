<?php

namespace App\Http\Controllers\Dashboard\Intern;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use App\Services\MatriculeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OnboardingController extends Controller
{
    public function index()
    {
        return view('dashboard.intern.onboarding.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'salutation' => ['required', 'string', 'in:miss,mr,mrs,dr,prof,chief,engr'],
            'id_card_number' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:25'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'school' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
            'diploma' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer', 'min:1'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'language' => ['required', 'string', 'in:english,french'],
            'other_information' => ['nullable', 'string', 'max:1000'],
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['matricule'] = MatriculeService::generate();

        Intern::create($validated);

        alert()->success('Registration Complete', 'You have successfully submitted your information');

        return redirect()->route('dashboard.intern');
    }

    public function edit(int $id)
    {
        return view('dashboard.intern.onboarding.edit', [
            'intern' => Intern::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id)
    {
        $intern = Intern::findOrFail($id);

        $validated = $request->validate([
            'salutation' => ['required', 'string', 'in:miss,mr,mrs,dr,prof,chief,engr'],
            'id_card_number' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:25'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'school' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
            'diploma' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer', 'min:1'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'language' => ['required', 'string', 'in:english,french'],
            'other_information' => ['nullable', 'string', 'max:1000'],
        ]);

        $validated['status'] = 'pending';

        $intern->update($validated);

        alert()->success('Registration Complete', 'You have successfully submitted your information');

        return redirect()->route('dashboard.intern');

    }
}
