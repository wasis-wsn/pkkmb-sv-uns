<?php
use App\Http\Controllers\HimaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/hima', [HimaController::class, 'index'])->name('hima');
    Route::post('/dashboard/hima', [HimaController::class, 'store'])->name('hima.store');
    Route::put('/dashboard/hima/{id}', [HimaController::class, 'update'])->name('hima.update');
    Route::delete('/dashboard/hima/{id}', [HimaController::class, 'destroy'])->name('hima.destroy');
});
Route::get('/data-hima', [HimaController::class, 'getAllHima']);

require __DIR__ . '/auth.php';