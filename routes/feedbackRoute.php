<?php
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::post('/api/feedback', [FeedbackController::class, 'store']);
Route::get('/api/feedback/words', [FeedbackController::class, 'getWordCloudData']);

require __DIR__ . '/auth.php';