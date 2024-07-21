<?php
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/data-youtube', [YoutubeController::class, 'getAllYoutube']);
    Route::get('/dashboard/youtube', [YoutubeController::class, 'index'])->name('youtube');
    Route::post('/dashboard/youtube', [YoutubeController::class, 'store'])->name('youtube.store');
    Route::put('/dashboard/youtube{id}', [YoutubeController::class, 'update'])->name('youtube.update');
    Route::delete('/dashboard/youtube{id}', [YoutubeController::class, 'destroy'])->name('youtube.destroy');
});

require __DIR__ . '/auth.php';