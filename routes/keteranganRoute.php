<?php
use App\Http\Controllers\KeteranganController ;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/keterangan', [KeteranganController::class, 'index'])->name('keterangan');
    Route::post('/dashboard/keterangan', [KeteranganController::class, 'store'])->name('keterangan.store');
    Route::put('/dashboard/keterangan/{id}', [KeteranganController::class, 'update'])->name('keterangan.update');
    Route::delete('/dashboard/keterangan/{id}', [KeteranganController::class, 'destroy'])->name('keterangan.destroy');
});
Route::get('/data-keterangan', [KeteranganController::class, 'getAllketerangan']);

require __DIR__ . '/auth.php';
