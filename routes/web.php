<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('HomeView', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('HomeView');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/form', function () {
    return Inertia::render('FormsView');
})->name('forms');
Route::middleware(['auth:sanctum', 'verified'])->get('/table', function () {
    return Inertia::render('TablesView');
})->name('tables');
Route::middleware(['auth:sanctum', 'verified'])->get('/login', function () {
    return Inertia::render('LoginView');
})->name('login');
Route::middleware(['auth:sanctum', 'verified'])->get('/profiles', function () {
    return Inertia::render('ProfileView');
})->name('profiles');
Route::middleware(['auth:sanctum', 'verified'])->get('/responsive', function () {
    return Inertia::render('ResponsiveView');
})->name('responsive');
Route::middleware(['auth:sanctum', 'verified'])->get('/style', function () {
    return Inertia::render('StyleView');
})->name('styles');
Route::middleware(['auth:sanctum', 'verified'])->get('/ui', function () {
    return Inertia::render('UiView');
})->name('ui');
Route::middleware(['auth:sanctum', 'verified'])->get('/error', function () {
    return Inertia::render('ErrorView');
})->name('error');
Route::middleware(['auth:sanctum', 'verified'])->get('/sponsor', function () {
    return Inertia::render('SponsorView');
})->name('sponsor');
Route::middleware(['auth:sanctum', 'verified'])->get('/hima', function () {
    return Inertia::render('HimaView');
})->name('hima');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
