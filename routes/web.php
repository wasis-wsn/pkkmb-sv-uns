<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Views/LandingView', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Dashboard Admin
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('DashboardView');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/form', function () {
    return Inertia::render('FormsView');
})->name('form');

Route::middleware(['auth:sanctum', 'verified'])->get('/table', function () {
    return Inertia::render('TablesView');
})->name('table');

Route::middleware(['auth:sanctum', 'verified'])->get('/ui', function () {
    return Inertia::render('UiView');
})->name('ui');

Route::middleware(['auth:sanctum', 'verified'])->get('/responsive', function () {
    return Inertia::render('ResponsiveView');
})->name('responsive');

Route::middleware(['auth:sanctum', 'verified'])->get('/style', function () {
    return Inertia::render('StyleView');
})->name('style');

Route::middleware(['auth:sanctum', 'verified'])->get('/profiles', function () {
    return Inertia::render('ProfileView');
})->name('profiles');

Route::middleware(['auth:sanctum', 'verified'])->get('/error', function () {
    return Inertia::render('ErrorView');
})->name('error');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Landing Page
Route::get('/', function () {
    return Inertia::render('Views/LandingView');
})->name('materi');

Route::get('/materi', function () {
    return Inertia::render('Views/MateriView');
})->name('materi');

Route::get('/kelompok', function () {
    return Inertia::render('Views/KelompokView');
})->name('kelompok');

Route::get('/galeri', function () {
    return Inertia::render('Views/GaleriView');
})->name('galeri');

Route::get('/tentang', function () {
    return Inertia::render('Views/AboutView');
})->name('tentang');

require __DIR__.'/auth.php';
