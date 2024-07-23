<?php
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('user.profile.update');
    Route::post('/profile/change-password', [UserProfileController::class, 'changePassword'])->name('user.change-password');
});
