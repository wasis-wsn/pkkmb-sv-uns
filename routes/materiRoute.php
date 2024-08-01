<?php
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/materi', [MateriController::class, 'index'])->name('materi');
    Route::post('/dashboard/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::put('/dashboard/materi{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/dashboard/materi{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
});
Route::get('/data-materi', [MateriController::class, 'getAllMateri']);

require __DIR__ . '/auth.php';