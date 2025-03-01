<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('user');
    Route::get('/userExport', [UserController::class, 'userExport'])->name('userExport');
    Route::post('/userImport', [UserController::class, 'userImport'])->name('userImport');
    Route::post('/dashboard/user', [UserController::class, 'store'])->name('user.store');
    Route::put('/dashboard/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/dashboard/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/data-user', [UserController::class, 'getAllUser']);
    Route::post('/tambah-semua-mahasiswa', [UserController::class, 'tambahSemuaMahasiswa'])->name('tambah.semua.mahasiswa');
});


require __DIR__ . '/auth.php';
