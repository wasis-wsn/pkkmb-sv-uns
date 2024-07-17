<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return Inertia::render('Views/LandingView', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard Admin
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('DashboardView');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/sponsor', function () {
    return Inertia::render('SponsorView');
})->name('sponsor');

Route::middleware(['auth:sanctum', 'verified'])->get('/hima', function () {
    return Inertia::render('HimaView');
})->name('hima');

Route::middleware(['auth:sanctum', 'verified'])->get('/form', function () {
    return Inertia::render('FormsView');
})->name('form');

Route::middleware(['auth:sanctum', 'verified'])->get('/galeris', function () {
    return Inertia::render('GaleriView');
})->name('galeris');

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/kelompok', function(){
//     return Inertia::render('KelompokView');
// })->name('kelompok');
Route::middleware(['auth:sanctum', 'verified'])->get('/kelompok', function () {
    return Inertia::render('KelompokView');
})->name('kelompok');

// Route::get('/kelompok', [MahasiswaController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/prodi', function () {
    return Inertia::render('ProdiView');
})->name('prodi');

Route::middleware(['auth:sanctum', 'verified'])->get('/mahasiswa', function () {
    return Inertia::render('MahasiswaView');
})->name('mahasiswa');

Route::middleware(['auth:sanctum', 'verified'])->get('/materis', function () {
    return Inertia::render('MateriView');
})->name('materis');

Route::middleware(['auth:sanctum', 'verified'])->get('/youtube', function () {
    return Inertia::render('YoutubeView');
})->name('youtube');

Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return Inertia::render('ChatView');
})->name('chat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Landing Page
Route::get('/', function () {
    return Inertia::render('Views/LandingView');
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

require __DIR__ . '/auth.php';
