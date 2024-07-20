<?php
use App\Http\Controllers\AcaraController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/data-galeri', [AcaraController::class, 'getAllAcara']);
    Route::get('/dashboard/acara', [AcaraController::class, 'index'])->name('acara');
    Route::post('/dashboard/acara', [AcaraController::class, 'store'])->name('acara.store');
    Route::put('/dashboard/acara/{id}', [AcaraController::class, 'update'])->name('acara.update');
    Route::delete('/dashboard/galeri/{id}', [AcaraController::class, 'destroy'])->name('acara.destroy');
});

require __DIR__ . '/auth.php';