<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\KeteranganSkill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
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
        $skills = Skill::all();

        // Fetch only the skills associated with the logged-in user
        $userSkills = KeteranganSkill::with(['skill'])
            ->where('mahasiswa_id', $mahasiswa->id)
            ->get();

        return Inertia::render('Views/UserProfileView', [
            'user' => $user,
            'data' => $userSkills,
            'skills' => $skills,
        ]);
    }

    /**
     * Show the form for editing the user's profile.
     */
    // Store Skill
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'deskripsi_skill' => 'required',
    //         'photo_piagam' => 'required',
    //         'skill_id' => 'required',
    //     ]);

    //     $mahasiswa = Auth::user()->mahasiswa;

    //     $keterangan = new KeteranganSkill();
    //     $keterangan->deskripsi_skill = $request->deskripsi_skill;
    //     $keterangan->photo_piagam = $request->photo_piagam;
    //     $keterangan->skill_id = $request->skill_id;
    //     $keterangan->mahasiswa_id = $mahasiswa->id;
    //     $keterangan->save();

    //     return Redirect::route('profile')->with('success', 'Skill added successfully.');
    // }


    public function edit(Request $request): Response
    {
        return Inertia::render('Views/UserProfileView', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'successMessage' => session('success'),
            'errorMessage' => session('error'),
        ]);
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
}
