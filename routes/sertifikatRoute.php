<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SertifikatController;



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat');
    Route::post('/dashboard/sertifikat/generate', [SertifikatController::class, 'generateSertifikat'])->name('sertifikat.generate');
    Route::get('/dashboard/sertifikat/download/{filename}', [SertifikatController::class, 'downloadSertifikat'])->name('sertifikat.download');
});

require __DIR__ . '/auth.php';