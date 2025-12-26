<?php

use App\Http\Controllers\Dashboard\InternController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\TemplateController;
use App\Services\FakeService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return FakeService::generate();
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // templates
    Route::get('templates', [TemplateController::class, 'index'])->name('template.index');
    Route::get('templates/{slug}', [TemplateController::class, 'show'])->name('template.show');
    Route::post('templates/{slug}/activate', [TemplateController::class, 'activate'])->name('template.activate');
    Route::post('templates/{slug}/deactivate', [TemplateController::class, 'deactivate'])->name('template.deactivate');

    // interns
    Route::prefix('interns')->group(function() {
        Route::get('/', [InternController::class, 'index'])->name('intern.index');
    });
});

require __DIR__.'/auth.php';
