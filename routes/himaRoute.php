<?php
use App\Http\Controllers\HimaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/hima', [HimaController::class, 'index'])->name('hima');
    Route::post('/dashboard/hima', [HimaController::class, 'store'])->name('hima.store');
    Route::put('/dashboard/hima/{hima}', [HimaController::class, 'update'])->name('hima.update');
    Route::delete('/dashboard/hima/{hima}', [HimaController::class, 'destroy'])->name('hima.destroy');
});

require __DIR__ . '/auth.php';