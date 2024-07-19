<?php
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/data-materi', [MateriController::class, 'getAllMateri']);
    Route::get('/dashboard/materi', [MateriController::class, 'index'])->name('materi');
    Route::post('/dashboard/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::put('/dashboard/materi{materi}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/dashboard/materi{materi}', [MateriController::class, 'destroy'])->name('materi.destroy');
});

require __DIR__ . '/auth.php';