<?php
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/dashboard/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::put('/dashboard/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/dashboard/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});

require __DIR__ . '/auth.php';
