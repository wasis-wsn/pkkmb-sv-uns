<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadTugasController;

Route::post('/upload', [UploadTugasController::class, 'upload'])->middleware('auth');


require __DIR__ . '/auth.php';
