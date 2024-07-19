<?php
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/youtube', [YoutubeController::class, 'index'])->name('youtube');
    Route::post('/dashboard/youtube', [YoutubeController::class, 'store'])->name('youtube.store');
    Route::put('/dashboard/youtube{youtube}', [YoutubeController::class, 'update'])->name('youtube.update');
    Route::delete('/dashboard/youtube{youtube}', [YoutubeController::class, 'destroy'])->name('youtube.destroy');
});

require __DIR__ . '/auth.php';