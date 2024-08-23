<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadTugasController;

Route::middleware(['auth'])->group(function () {
    Route::post('/upload', [UploadTugasController::class, 'upload']);
});

require __DIR__ . '/auth.php';
