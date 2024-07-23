<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $profileData = [
            'nama' => $user->name,
            'email' => $user->email,
            'nama_skill' => $mahasiswa ? $mahasiswa->nama_skill : null,
            'deskripsi_skill' => $mahasiswa ? $mahasiswa->deskripsi_skill : null,
            'photo_piagam' => $mahasiswa ? $mahasiswa->photo_piagam : null,
        ];

        return Inertia::render('UserProfile', [
            'profileData' => $profileData
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'nama_skill' => 'nullable|string|max:255',
            'deskripsi_skill' => 'nullable|string',
            'photo_piagam' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        // Update user data
        if ($request->filled('nama')) {
            $user->name = $validated['nama'];
        }
        if ($request->filled('email')) {
            $user->email = $validated['email'];
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        // Update mahasiswa data
        if ($mahasiswa) {
            if ($request->filled('nama_skill')) {
                $mahasiswa->nama_skill = $validated['nama_skill'];
            }
            if ($request->filled('deskripsi_skill')) {
                $mahasiswa->deskripsi_skill = $validated['deskripsi_skill'];
            }
            if ($request->hasFile('photo_piagam')) {
                $path = $request->file('photo_piagam');
                $fileName = $path->hashName();
                $path->storeAs('public/piagam', $fileName);
                $mahasiswa->photo_piagam = $fileName;
            }
            $mahasiswa->save();
        }

        return redirect()->route('user.profile')->with('message', 'Profile updated successfully');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.profile')->with('message', 'Password changed successfully');
    }
}
