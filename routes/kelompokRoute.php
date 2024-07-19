<?php
use App\Http\Controllers\KelompokController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/kelompok', [KelompokController::class, 'index'])->name('kelompok');
    Route::post('/dashboard/kelompok', [KelompokController::class, 'store'])->name('kelompok.store');
    Route::put('/dashboard/kelompok/{kelompok}', [KelompokController::class, 'update'])->name('kelompok.update');
    Route::delete('/dashboard/kelompok/{kelompok}', [KelompokController::class, 'destroy'])->name('kelompok.destroy');
});

require __DIR__ . '/auth.php';
