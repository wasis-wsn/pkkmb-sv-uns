<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('user');
    Route::post('/dashboard/user', [UserController::class, 'store'])->name('user.store');
    Route::put('/dashboard/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/dashboard/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
Route::get('/data-user', [UserController::class, 'getAllUser']);

require __DIR__ . '/auth.php';
