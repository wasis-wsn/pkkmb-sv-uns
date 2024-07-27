<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use Inertia\Response;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\KeteranganSkill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProfileUserController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function getSkillData(Request $request)
    {
        // Mengambil data pengguna yang sedang login
        $user = $request->user();

        // Mengambil data mahasiswa yang terkait dengan pengguna
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan untuk pengguna ini.'], 404);
        }
        // Mengambil data keterangan yang terkait dengan mahasiswa
        $keterangan = KeteranganSkill::where('mahasiswa_id', $mahasiswa->id)->with('skill')->get();
        return response()->json($keterangan);
    }

    public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return Redirect::to('/');
        }
        
        $skills = Skill::all();

        // Fetch only the skills associated with the logged-in user
        $userSkills = KeteranganSkill::with(['skill'])
            ->where('mahasiswa_id', $mahasiswa->id)
            ->get();

        return Inertia::render('Views/UserProfileView', [
            'user' => $user,
            'data' => $userSkills,
            'mahasiswa' => $mahasiswa,
            'skills' => $skills,
        ]);
    }

    // Store Email
    public function storeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile')
            ->with('success', 'Email updated successfully');
    }

    // Store Telepon
    public function storeTelepon(Request $request)
    {
        $request->validate([
            'no_telp' => 'required|string|max:15', // Adjust the validation rules as needed
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user has a linked mahasiswa
        if ($user->mahasiswa_id) {
            // Find the mahasiswa record
            $mahasiswa = Mahasiswa::find($user->mahasiswa_id);

            // Update the no_telp field
            if ($mahasiswa) {
                $mahasiswa->no_telp = $request->no_telp;
                $mahasiswa->save();

                return redirect()->route('profile')
                    ->with('success', 'Nomor telepon updated successfully');
            } else {
                return redirect()->route('profile')
                    ->with('error', 'Mahasiswa not found');
            }
        } else {
            return redirect()->route('profile')
                ->with('error', 'No associated mahasiswa found');
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profiles')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }
}
