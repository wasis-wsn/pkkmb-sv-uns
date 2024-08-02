<?php
use App\Http\Controllers\LinkMateriController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/linkmateri', [LinkMateriController::class, 'index'])->name('linkmateri');
    Route::post('/dashboard/linkmateri', [LinkMateriController::class, 'store'])->name('linkmateri.store');
    Route::put('/dashboard/linkmateri{id}', [LinkMateriController::class, 'update'])->name('linkmateri.update');
    Route::delete('/dashboard/linkmateri{id}', [LinkMateriController::class, 'destroy'])->name('linkmateri.destroy');
});
Route::get('/data-linkmateri', [LinkMateriController::class, 'getAllLinkMateri']);

require __DIR__ . '/auth.php';