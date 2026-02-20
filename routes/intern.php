<?php

use Illuminate\Support\Facades\Route;


Route::prefix('intern')->middleware(['auth', 'role:intern', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.intern.index');
    })->name('dashboard.intern');

});
