<?php
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/sponsor', [SponsorController::class, 'index'])->name('sponsor');
    Route::post('/dashboard/sponsor', [SponsorController::class, 'store'])->name('sponsor.store');
    Route::put('/dashboard/sponsor/{sponsor}', [SponsorController::class, 'update'])->name('sponsor.update');
    Route::delete('/dashboard/sponsor/{sponsor}', [SponsorController::class, 'destroy'])->name('sponsor.destroy');
});

require __DIR__ . '/auth.php';