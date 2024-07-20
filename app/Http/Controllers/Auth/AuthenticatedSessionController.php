<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Get Session view.
     */    
    public function getSessionData(Request $request)
    {
        dd($request->session()->all());
    }

    /**
     * Get Loggedin User.
     */
    public function getLoggedInUser(Request $request)
    {
        $user = $request->user()->load('mahasiswa.prodi', 'mahasiswa.kelompok');

        return response()->json($user);
    }

    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Views/LoginView', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        $request->session()->regenerate();

        // Simpan mahasiswa_id dan pesan_id di session
        $request->session()->put('mahasiswa_id', $user->mahasiswa_id);
        $request->session()->put('pesan_id', $user->pesan_id);

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->intended('/');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
