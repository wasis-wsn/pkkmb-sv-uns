<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;

// Route untuk landing page
Route::get('/', function () {
    return Inertia::render('Views/LandingView', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landing');

Route::get('/materi', function () {
    return Inertia::render('Views/MateriView');
})->name('materi');
// Add this route in web.php
Route::get('/materi/all', [MateriController::class, 'getAllMateri'])->name('materi.all');

Route::get('/kelompok', function () {
    return Inertia::render('Views/KelompokView');
})->name('kelompok');

Route::get('/galeri', function () {
    return Inertia::render('Views/GaleriView');
})->name('galeri');

Route::get('/tentang', function () {
    return Inertia::render('Views/AboutView');
})->name('tentang');

// Route untuk dashboard dan halaman terproteksi
Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('DashboardView');
    })->name('dashboard');

    // Profile Admin
    Route::get('/dashboard/profiles', [ProfileController::class, 'edit'])->name('profiles');
    Route::patch('/dashboard/profiles-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profiles-delete', [ProfileController::class, 'destroy'])->name('profile.delete');
});

Route::get('/error', function () {
    return Inertia::render('ErrorView');
})->name('error');

Route::get('/ui', function () {
    return Inertia::render('UiView');
})->name('ui');

require __DIR__ . '/auth.php';
require __DIR__ . '/galeriRoute.php';
require __DIR__ . '/kelompokRoute.php';
require __DIR__ . '/prodiRoute.php';
require __DIR__ . '/mahasiswaRoute.php';
require __DIR__ . '/sponsorRoute.php';
require __DIR__ . '/himaRoute.php';
require __DIR__ . '/materiRoute.php';
require __DIR__ . '/youtubeRoute.php';
require __DIR__ . '/userRoute.php';
require __DIR__ . '/dokumentasiRoute.php';
require __DIR__ . '/feedbackRoute.php';
