<?php
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/dashboard/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::put('/dashboard/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/dashboard/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});
Route::get('/data-mahasiswa', [MahasiswaController::class, 'getAllMahasiswa']);

require __DIR__ . '/auth.php';
