<?php

use App\Http\Controllers\Dashboard\Intern\OnboardingController;
use App\Http\Controllers\Dashboard\Intern\OverviewController;
use Illuminate\Support\Facades\Route;


Route::prefix('intern/dashboard')->middleware(['auth', 'role:intern', 'intern-profile', 'intern-rejected', 'verified'])->group(function () {

    Route::get('/', [OverviewController::class , 'index'])->name('dashboard.intern');
    Route::patch('/update', [OverviewController::class , 'update'])->name('dashboard.intern.update');

});

Route::get('/intern/onboarding', [OnboardingController::class, 'index'])->middleware(['intern-no-profile'])->name('dashboard.intern.onboarding');

Route::post('/intern/onboarding/store', [OnboardingController::class, 'store'])->middleware(['intern-no-profile'])->name('dashboard.intern.onboarding.store');

Route::get('/intern/onboarding/edit/{id}', [OnboardingController::class, 'edit'])->middleware(['intern-not-rejected'])->name('dashboard.intern.onboarding.edit');

Route::put('/intern/onboarding/update/{id}', [OnboardingController::class, 'update'])->middleware(['intern-not-rejected'])->name('dashboard.intern.onboarding.update');

