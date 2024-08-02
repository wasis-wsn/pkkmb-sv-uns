<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;

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
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chat', function () {
        return Inertia::render('ChatView');
    })->name('chat');

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
require __DIR__ . '/skillRoute.php';
require __DIR__ . '/mahasiswaRoute.php';
require __DIR__ . '/sponsorRoute.php';
require __DIR__ . '/himaRoute.php';
require __DIR__ . '/materiRoute.php';
require __DIR__ . '/youtubeRoute.php';
require __DIR__ . '/userRoute.php';
require __DIR__ . '/dokumentasiRoute.php';
require __DIR__ . '/feedbackRoute.php';
require __DIR__ . '/uploadRoute.php';
require __DIR__ . '/keteranganRoute.php';
require __DIR__ . '/profileUserRoute.php';
require __DIR__ . '/pesanRoute.php';
require __DIR__ . '/linkMateriRoute.php';
