<?php
use App\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/faq', [FAQController::class, 'index'])->name('faq');
    Route::post('/dashboard/faq', [FAQController::class, 'store'])->name('faq.store');
    Route::put('/dashboard/faq/{id}', [FAQController::class, 'update'])->name('faq.update');
    Route::delete('/dashboard/faq/{id}', [FAQController::class, 'destroy'])->name('faq.destroy');
});
Route::get('/data-faq', [FAQController::class, 'getAllFAQ']);

require __DIR__ . '/auth.php';
