<?php
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/data-galeri', [GaleriController::class, 'getAllGaleri']);
    Route::get('/dashboard/galeri', [GaleriController::class, 'index'])->name('galeri');
    Route::post('/dashboard/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/dashboard/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/dashboard/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
});

require __DIR__ . '/auth.php';