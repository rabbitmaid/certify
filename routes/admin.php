<?php

use App\Http\Controllers\Dashboard\Admin\CertificateController;
use App\Http\Controllers\Dashboard\Admin\InternController;
use App\Http\Controllers\Dashboard\Admin\InternshipBatchController;
use App\Http\Controllers\Dashboard\Admin\InternshipSessionController;
use App\Http\Controllers\Dashboard\Admin\OverviewController;
use App\Http\Controllers\Dashboard\Admin\SettingController;
use App\Http\Controllers\Dashboard\Admin\TemplateController;
use Illuminate\Support\Facades\Route;




Route::prefix('/dashboard')->middleware(['auth', 'role:admin', 'verified'])->group(function(){
    
    Route::get('/', [OverviewController::class, 'index'])->name('dashboard');

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

    // Internship Session
    Route::prefix('internship-session')->group(function() {

        Route::get("/", [InternshipSessionController::class, 'index'])->name('internship-session.index');
        Route::get("/create", [InternshipSessionController::class, 'create'])->name('internship-session.create');
        Route::post("/store", [InternshipSessionController::class, 'store'])->name('internship-session.store');
        Route::delete('/destroy', [InternshipSessionController::class, 'destroy'])->name('internship-session.destroy');
        Route::get("/edit/{id}", [InternshipSessionController::class, 'edit'])->name('internship-session.edit');
        Route::put("/update/{id}", [InternshipSessionController::class, 'update'])->name('internship-session.update');
        Route::get("/{id}", [InternshipSessionController::class, 'show'])->name('internship-session.show');
    });

    // Internship Batches
    Route::prefix('internship-batch')->group(function() {
        Route::get("/", [InternshipBatchController::class, 'index'])->name('internship-batch.index');
        Route::get("/create", [InternshipBatchController::class, 'create'])->name('internship-batch.create');
        Route::post("/store", [InternshipBatchController::class, 'store'])->name('internship-batch.store');
        Route::delete('/destroy', [InternshipBatchController::class, 'destroy'])->name('internship-batch.destroy');
        Route::get("/edit/{id}", [InternshipBatchController::class, 'edit'])->name('internship-batch.edit');
        Route::put("/update/{id}", [InternshipBatchController::class, 'update'])->name('internship-batch.update');

        Route::get("/attach/{id}", [InternshipBatchController::class, 'attach'])->name('internship-batch.attach');

        Route::post("/attach/store/{id}", [InternshipBatchController::class, 'attachStore'])->name('internship-batch.attach.store');

        Route::delete("/detach/{id}", [InternshipBatchController::class, 'detach'])->name('internship-batch.detach');

        Route::get("/{id}", [InternshipBatchController::class, 'show'])->name('internship-batch.show');
        
    });

    // Generate attestation route
     Route::prefix('certificate')->group(function() {
        Route::get("/", [CertificateController::class, 'index'])->name('certificate.index');
        Route::get("/create", [CertificateController::class, 'create'])->name('certificate.create');
        Route::post("/store", [CertificateController::class, 'store'])->name('certificate.store');
        Route::delete("/destroy", [CertificateController::class, 'destroy'])->name('certificate.destroy');
        Route::get('/view/{certificate}', [CertificateController::class, 'view'])
    ->name('certificate.view');

      Route::post('/bulk', [CertificateController::class, 'bulkActions'])->name('certificate.bulk.actions');

        // submissions
        Route::get("/submissions", [CertificateController::class, 'submission'])->name('submission.index');
        Route::post("/submissions/batch/generate", [CertificateController::class, 'generate'])->name('submission.generate');

        Route::get("/submissions/individual/{id}", [CertificateController::class, 'individual'])->name('submission.individual');
        Route::post("/submissions/individual/generate", [CertificateController::class, 'individualGenerate'])->name('submission.individual.generate');

        Route::delete("/submissions/destroy", [CertificateController::class, 'destroySubmission'])->name('submission.destroy');

     });

    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::patch('/settings/update', [SettingController::class, 'update'])->name('setting.update');
});