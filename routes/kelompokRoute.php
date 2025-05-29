<?php
use App\Http\Controllers\KelompokController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/kelompok', [KelompokController::class, 'index'])->name('kelompok.index');
    Route::post('/dashboard/kelompok', [KelompokController::class, 'store'])->name('kelompok.store');
    Route::put('/dashboard/kelompok/{id}', [KelompokController::class, 'update'])->name('kelompok.update');
    Route::delete('/dashboard/kelompok/{id}', [KelompokController::class, 'destroy'])->name('kelompok.destroy');
});
Route::get('/data-kelompok', [KelompokController::class, 'getAllKelompok']);

require __DIR__ . '/auth.php';
