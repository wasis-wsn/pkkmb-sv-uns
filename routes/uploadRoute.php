<?php

use App\Http\Controllers\UploadTugasController;
use Illuminate\Support\Facades\Route;

// Route untuk mengupload file
Route::get('/upload', [UploadTugasController::class, 'upload']);

require __DIR__ . '/auth.php';

