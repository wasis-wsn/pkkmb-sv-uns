<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadTugasController;
use Illuminate\Support\Facades\Storage;

Route::post('/upload', [UploadTugasController::class, 'upload']);


require __DIR__ . '/auth.php';
