<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('user');
    Route::post('/dashboard/user', [UserController::class, 'store'])->name('user.store');
    Route::put('/dashboard/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/dashboard/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::resource('user', UserController::class);

});

require __DIR__ . '/auth.php';
