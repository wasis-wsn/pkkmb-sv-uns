<?php
use App\Http\Controllers\GardanaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/gardana', [GardanaController::class, 'index'])->name('gardana');
    Route::post('/dashboard/gardana', [GardanaController::class, 'store'])->name('gardana.store');
    Route::put('/dashboard/gardana/{id}', [GardanaController::class, 'update'])->name('gardana.update');
    Route::delete('/dashboard/gardana/{id}', [GardanaController::class, 'destroy'])->name('gardana.destroy');
});
Route::get('/data-gardana', [GardanaController::class, 'getAllGardana']);

require __DIR__ . '/auth.php';
