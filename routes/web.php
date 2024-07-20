<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GaleriController;
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

Route::get('/implementasi', function () {
    return Inertia::render('Views/MateriView');
})->name('implementasi');

Route::get('/kellompok', function () {
    return Inertia::render('Views/KelompokView');
})->name('kellompok');

Route::get('/galleri', function () {
    return Inertia::render('Views/GaleriView');
})->name('galleri');

Route::get('/tentang', function () {
    return Inertia::render('Views/AboutView');
})->name('tentang');

// Route untuk dashboard dan halaman terproteksi
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('DashboardView');
    })->name('dashboard');

    Route::get('/dashboard/materis', function () {
        return Inertia::render('MateriView');
    })->name('materis');

    Route::get('/dashboard/youtube', function () {
        return Inertia::render('YoutubeView');
    })->name('youtube');

    Route::get('/dashboard/chat', function () {
        return Inertia::render('ChatView');
    })->name('chat');

    Route::get('/dashboard/user', function () {
        return Inertia::render('UserView');
    })->name('user');

    // Profile Admin
    Route::get('/dashboard/profiles', [ProfileController::class, 'edit'])->name('profiles');
    Route::patch('/dashboard/profiles-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profiles-delete', [ProfileController::class, 'destroy'])->name('profile.delete');
});

// Route untuk error
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
