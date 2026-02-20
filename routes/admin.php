<?php
use App\Http\Controllers\Dashboard\Admin\InternController;
use App\Http\Controllers\Dashboard\Admin\SettingController;
use App\Http\Controllers\Dashboard\Admin\TemplateController;
use Illuminate\Support\Facades\Route;



Route::prefix('/dashboard')->middleware(['auth', 'role:admin', 'verified'])->group(function(){
    
    Route::get('/', function () {
        return view('dashboard.admin.index');
    })->name('dashboard');

    // templates
    Route::get('templates', [TemplateController::class, 'index'])->name('template.index');
    Route::get('templates/create', [TemplateController::class, 'create'])->name('template.create');
    Route::post('templates/upload', [TemplateController::class, 'upload'])->name('template.upload');
    Route::delete('templates/delete', [TemplateController::class, 'destroy'])->name('template.destroy');
    Route::get('templates/{slug}', [TemplateController::class, 'show'])->name('template.show');
    Route::post('templates/{slug}/activate', [TemplateController::class, 'activate'])->name('template.activate');
    Route::post('templates/{slug}/deactivate', [TemplateController::class, 'deactivate'])->name('template.deactivate');

    // interns
    Route::prefix('interns')->group(function() {
        Route::get('/', [InternController::class, 'index'])->name('intern.index');
    });

    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
});