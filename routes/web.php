<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GaleriController;
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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/sponsor', function () {
    return Inertia::render('SponsorView');
})->name('sponsor');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/hima', function () {
    return Inertia::render('HimaView');
})->name('hima');

//Materi
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/materis', function () {
    return Inertia::render('MateriView');
})->name('materis');

//Galeri
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/galerise', function () {
    return Inertia::render('GaleriView');
})->name('galerise');

//Kelompok
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/kelompok', function () {
    return Inertia::render('KelompokView');
})->name('kelompok');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/prodi', function () {
    return Inertia::render('ProdiView');
})->name('prodi');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/mahasiswa', function () {
    return Inertia::render('MahasiswaView');
})->name('mahasiswa');

//User
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/profiles', function () {
    return Inertia::render('ProfileView');
})->name('profiles');

//Error
Route::middleware(['auth:sanctum', 'verified'])->get('/error', function () {
    return Inertia::render('ErrorView');
})->name('error');

//Youtube
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/youtube', function () {
    return Inertia::render('YoutubeView');
})->name('youtube');

//Chat
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/chat', function () {
    return Inertia::render('ChatView');
})->name('chat');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Route Controller Galeri

Route::resource('galeris', GaleriController::class);
// Route::get('/galerise', [GaleriController::class, 'index'])
//     ->name('galerise.index');
// Route::get('/galerise/create', [GaleriController::class, 'create'])
//     ->name('galerise.create');
// Route::post('/galerise/store', [GaleriController::class, 'store'])
//     ->name('galerise.store');
// Route::get('/galerise/{galeri}', [GaleriController::class, 'show'])
//     ->name('galerise.show');
// Route::get('/galerise/{galeri}/edit', [GaleriController::class, 'edit'])
//     ->name('galerise.edit');
// Route::put('/galerise/{galeri}/update', [GaleriController::class, 'update'])
//     ->name('galerise.update');
// Route::delete('/galerise/{galeri}/delete', [GaleriController::class, 'destroy'])
//     ->name('galerise.delete');




require __DIR__ . '/auth.php';