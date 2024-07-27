<?php
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Admin chat page
    Route::get('/dashboard/chat', [PesanController::class, 'adminMessages'])->name('admin.messages');
    
    // API routes
    Route::get('/get-chats', [PesanController::class, 'getChats'])->name('api.chats');
    Route::get('/get-messages', [PesanController::class, 'getMessages'])->name('api.messages');
    Route::post('/post-messages/send', [PesanController::class, 'postMessage'])->name('api.send.message');
    Route::delete('/delete-messages/{id}', [PesanController::class, 'destroy'])->name('api.delete.message');
});

require __DIR__ . '/auth.php';