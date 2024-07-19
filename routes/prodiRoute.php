<?php
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/data-prodi', [ProdiController::class, 'getAllProdi']);
    Route::get('/dashboard/prodi', [ProdiController::class, 'index'])->name('prodi');
    Route::post('/dashboard/prodi', [ProdiController::class, 'store'])->name('prodi.store');
    Route::put('/dashboard/prodi/{prodi}', [ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('/dashboard/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
});

require __DIR__ . '/auth.php';
