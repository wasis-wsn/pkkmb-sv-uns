<?php
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/chats', [ChatController::class, 'getChats']);
    Route::get('/messages/{roomId}', [ChatController::class, 'getMessages']);
    Route::post('/messages', [ChatController::class, 'postMessage']);
});
require __DIR__ . '/auth.php';