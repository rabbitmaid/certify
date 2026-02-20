<?php

use Illuminate\Support\Facades\Route;


Route::prefix('intern/dashboard')->middleware(['auth', 'role:intern', 'intern-profile', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.intern.index');
    })->name('dashboard.intern');
});

Route::get('/intern/onboarding', function () {
    return view('dashboard.intern.onboarding.index');
})->middleware(['intern-no-profile'])->name('dashboard.intern.onboarding');
