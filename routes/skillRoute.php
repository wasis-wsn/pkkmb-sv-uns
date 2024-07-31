<?php
use App\Http\Controllers\skillController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/skill', [SkillController::class, 'index'])->name('skill');
    Route::post('/dashboard/skill', [SkillController::class, 'store'])->name('skill.store');
    Route::put('/dashboard/skill/{id}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('/dashboard/skill/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');
});
Route::get('/data-skill', [SkillController::class, 'getAllSkill']);

require __DIR__ . '/auth.php';
