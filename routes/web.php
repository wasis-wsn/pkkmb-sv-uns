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

//* Landing Page
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

//** Dashboard */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('DashboardView');
})->name('dashboard');

//Landing
Route::middleware(['auth:sanctum', 'verified'])->get('/sponsor', function () {
    return Inertia::render('SponsorView');
})->name('sponsor');

Route::middleware(['auth:sanctum', 'verified'])->get('/hima', function () {
    return Inertia::render('HimaView');
})->name('hima');

//Materi
Route::middleware(['auth:sanctum', 'verified'])->get('/materis', function () {
    return Inertia::render('MateriView');
})->name('materis');

//Galeri
Route::middleware(['auth:sanctum', 'verified'])->get('/galeris', function () {
    return Inertia::render('GaleriView');
})->name('galeris');

//Kelompok
Route::middleware(['auth:sanctum', 'verified'])->get('/kelompok', [MahasiswaController::class, 'index'], function(){
    return Inertia::render('KelompokView');
})->name('kelompok');

Route::middleware(['auth:sanctum', 'verified'])->get('/prodi', function () {
    return Inertia::render('ProdiView');
})->name('prodi');

Route::middleware(['auth:sanctum', 'verified'])->get('/mahasiswa', function () {
    return Inertia::render('MahasiswaView');
})->name('mahasiswa');

//User
Route::middleware(['auth:sanctum', 'verified'])->get('/profiles', function () {
    return Inertia::render('ProfileView');
})->name('profiles');

//Error
Route::middleware(['auth:sanctum', 'verified'])->get('/error', function () {
    return Inertia::render('ErrorView');
})->name('error');

//Youtube
Route::middleware(['auth:sanctum', 'verified'])->get('/youtube', function () {
    return Inertia::render('YoutubeView');
})->name('youtube');

//Chat
Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return Inertia::render('ChatView');
})->name('chat');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';