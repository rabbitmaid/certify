<?php
use App\Http\Controllers\Dashboard\Admin\InternController;
use App\Http\Controllers\Dashboard\Admin\InternshipSessionController;
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
        Route::get('/create', [InternController::class, 'create'])->name('intern.create');
        Route::post('/store', [InternController::class, 'store'])->name('intern.store');

        Route::patch('/approve', [InternController::class, 'approve'])->name('intern.approve');
        Route::patch('/unapprove', [InternController::class, 'unapprove'])->name('intern.unapprove');

        Route::get('/reject/{id}', [InternController::class, 'rejectReason'])->name('intern.reject.reason');
        
        Route::put('/reject', [InternController::class, 'reject'])->name('intern.reject');


        Route::post('/bulk', [InternController::class, 'bulkActions'])->name('intern.bulk.actions');

        Route::delete('/destroy', [InternController::class, 'destroy'])->name('intern.destroy');

        Route::get('/edit/{id}', [InternController::class, 'edit'])->name('intern.edit');
        Route::put('/update/{id}', [InternController::class, 'update'])->name('intern.update');

        Route::get('/{id}', [InternController::class, 'show'])->name('intern.show');
    });

    Route::prefix('internship-session')->group(function() {

        Route::get("/", [InternshipSessionController::class, 'index'])->name('internship-session.index');
        Route::get("/{id}", [InternshipSessionController::class, 'show'])->name('internship-session.show');
        Route::get("/create", [InternshipSessionController::class, 'create'])->name('internship-session.create');
        Route::post("/store", [InternshipSessionController::class, 'store'])->name('internship-session.store');
        Route::get("/edit/{id}", [InternshipSessionController::class, 'edit'])->name('internship-session.edit');
        Route::put("/update/{id}", [InternshipSessionController::class, 'update'])->name('internship-session.update');

    });

    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
});