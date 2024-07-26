<?php
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/messages', [PesanController::class, 'adminMessages'])->name('admin.messages');
    Route::get('/chats', [PesanController::class, 'getChats'])->name('api.chats');
    Route::get('/messages', [PesanController::class, 'getMessages'])->name('api.messages');
    Route::post('/messages/send', [PesanController::class, 'postMessage'])->name('api.send.message');
    Route::delete('/messages/{id}', [PesanController::class, 'destroy'])->name('api.delete.message');
});


require __DIR__ . '/auth.php';