<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\ProdiController;

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

Route::get('/kellompok', function () {
    return Inertia::render('Views/KelompokView');
})->name('kellompok');

Route::get('/galleri', function () {
    return Inertia::render('Views/GaleriView');
})->name('galleri');

Route::get('/tentang', function () {
    return Inertia::render('Views/AboutView');
})->name('tentang');



//** Dashboard */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('DashboardView');
    })->name('dashboard');

    //Landing
    Route::get('/dashboard/sponsor', function () {
        return Inertia::render('SponsorView');
    })->name('sponsor');

    Route::get('/dashboard/hima', function () {
        return Inertia::render('HimaView');
    })->name('hima');

    //Materi
    Route::get('/dashboard/materis', function () {
        return Inertia::render('MateriView');
    })->name('materis');

    //Galeri


    //Kelompok

    //User
    Route::get('/dashboard/profiles', function () {
        return Inertia::render('ProfileView');
    })->name('profiles');

    //Error
    Route::get('/error', function () {
        return Inertia::render('ErrorView');
    })->name('error');

    //Youtube
    Route::get('/dashboard/youtube', function () {
        return Inertia::render('YoutubeView');
    })->name('youtube');

    //Chat
    Route::get('/dashboard/chat', function () {
        return Inertia::render('ChatView');
    })->name('chat');

    //user
    Route::get('/dashboard/user', function () {
        return Inertia::render('UserView');
    })->name('user');
});

//** Profile Admin */
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/galeriRoute.php';
require __DIR__ . '/kelompokRoute.php';
require __DIR__ . '/prodiRoute.php';
require __DIR__ . '/mahasiswaRoute.php';
