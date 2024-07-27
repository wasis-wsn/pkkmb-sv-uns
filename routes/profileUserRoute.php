<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\ProfileUserController;


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileUserController::class, 'index'])->name('profile');
    Route::post('/profile/keterangan', [KeteranganController::class, 'storeUser'])->name('profile.store');
    Route::post('/profile', [SkillController::class, 'storeUser'])->name('userSkill.store');
    Route::post('/profile/email', [ProfileUserController::class, 'storeEmail'])->name('profileEmail.store');
    Route::post('/profile/telepon', [ProfileUserController::class, 'storeTelepon'])->name('profileTelepon.store');
    Route::put('/profile/skill/{id}', [KeteranganController::class, 'updateUser'])->name('profileSkill.update');
    Route::put('/profile/password', [ProfileUserController::class, 'updatePassword'])->name('profilePassword.update');
    Route::delete('/profile/skill/{id}', [KeteranganController::class, 'destroyUser'])->name('profileSkill.destroy');
    Route::get('/data-skill', [ProfileUserController::class, 'getSkillData']);
});

require __DIR__ . '/auth.php';
