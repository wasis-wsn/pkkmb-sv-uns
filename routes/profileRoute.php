<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;

Route::middleware(['auth'])->group(function () {
    // Di route file web.php
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('user.profile.update');
    Route::post('/profile/change-password', [UserProfileController::class, 'changePassword'])->name('user.profile.changePassword');
    Route::delete('/profile/{id}', [UserProfileController::class, 'destroy'])->name('user.profile.destroy');
});
