<?php

use App\Http\Controllers\Dashboard\InternController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\TemplateController;
use App\Http\Controllers\PageController;
use App\Services\FakeService;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/test', function () {
    return FakeService::generate();
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
