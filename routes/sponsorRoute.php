<?php
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/sponsor', [SponsorController::class, 'index'])->name('sponsor');
    Route::post('/dashboard/sponsor', [SponsorController::class, 'store'])->name('sponsor.store');
    Route::put('/dashboard/sponsor/{id}', [SponsorController::class, 'update'])->name('sponsor.update');
    Route::delete('/dashboard/sponsor/{id}', [SponsorController::class, 'destroy'])->name('sponsor.destroy');
});
Route::get('/data-sponsor', [SponsorController::class, 'getAllSponsor']);

require __DIR__ . '/auth.php';