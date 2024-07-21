<?php
use App\Http\Controllers\DokumentasiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi');
    Route::post('/dashboard/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::put('/dashboard/dokumentasi/{id}', [DokumentasiController::class, 'update'])->name('dokumentasi.update');
    Route::delete('/dashboard/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.destroy');
});
Route::get('/data-dokumentasi', [DokumentasiController::class, 'getAllDokumentasi']);

require __DIR__ . '/auth.php';