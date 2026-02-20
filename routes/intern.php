<?php

use App\Http\Controllers\Dashboard\Intern\OnboardingController;
use Illuminate\Support\Facades\Route;


Route::prefix('intern/dashboard')->middleware(['auth', 'role:intern', 'intern-profile', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.intern.index');
    })->name('dashboard.intern');
});

Route::get('/intern/onboarding', [OnboardingController::class, 'index'])->middleware(['intern-no-profile'])->name('dashboard.intern.onboarding');


Route::post('/intern/onboarding/store', [OnboardingController::class, 'store'])->middleware(['intern-no-profile'])->name('dashboard.intern.onboarding.store');