<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        $user = $request->user();
        
        if (! $user->hasVerifiedEmail()) {
            return view('auth.verify-email');
        }

        return match (true) {
            $user->hasRole('admin') => redirect()->intended(route('dashboard', absolute: false)),
            $user->hasRole('intern') => redirect()->intended(route('dashboard.intern', absolute: false)),
            default => redirect()->intended(route('home', absolute: false)),
        };
    }
}
