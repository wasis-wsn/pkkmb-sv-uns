<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Imports\UserImport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function getAllUser()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }

    /**
     * Display the registration view.
     */
    public function index()
    {
        $users = User::all();
        $mahasiswa = Mahasiswa::all();
        return Inertia::render('UserView', ['data' => $users, 'mahasiswa' => $mahasiswa]);
    }

    public function userExport()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function userImport(Request $request)
    {
        try {
            // Validate the file
            $request->validate([
                'file_user' => 'required|file|mimes:xlsx,xls',
            ]);

            $file = $request->file('file_user');
            $namaFile = $file->getClientOriginalName();
            $file->move('DataUser', $namaFile);

            // Import the data
            Excel::import(new UserImport, public_path('/DataUser/' . $namaFile));
            // Run the command to hash passwords
            Artisan::call('users:hash-passwords');
            return redirect('/dashboard/user')->with('success', 'Data berhasil diimport');
        } catch (\Exception $e) {
            // Optionally, you can return the error message for debugging purposes
            return redirect('/dashboard/user')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'nullable|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'role' => 'required|string',
            'nama_mahasiswa' => 'nullable|string|exists:mahasiswa,nama_mahasiswa'
        ]);

        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
            'nama_mahasiswa' => $request->input('nama_mahasiswa'),
        ]);

        return redirect()->route('user');
    }

    public function update(Request $request, User $id)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'nullable|string|lowercase|email|max:255|unique:users,email,' . $id->id,
        ]);

        $dataToUpdate = [];

        if ($request->filled('username')) {
            $dataToUpdate['username'] = $request['username'];
        }

        if ($request->filled('email')) {
            $dataToUpdate['email'] = $request['email'];
        }

        $id->update($dataToUpdate);

        return redirect()->route('user');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('user');
    }

    public function tambahSemuaMahasiswa()
    {
        $mahasiswas = Mahasiswa::all();
        $berhasil = 0;
        $gagal = 0;

        foreach ($mahasiswas as $mahasiswa) {
            // Generate a unique username by including mahasiswa ID
            $username = preg_replace('/[^a-zA-Z0-9]/', '', $mahasiswa->nama_mahasiswa);
            $username = Str::lower(Str::substr($username, 0, 8)) . $mahasiswa->id;

            // Generate password from name
            $password = preg_replace('/[^a-zA-Z0-9]/', '', $mahasiswa->nama_mahasiswa);
            $password = Str::lower(Str::substr($password, 0, 8)); // Ensure it is 8 characters long

            try {
                // Check if the user already exists
                $existingUser = User::where('username', $username)->first();
                if (!$existingUser) {
                    User::create([
                        'username' => $username,
                        'email' => null,
                        'password' => bcrypt($password),
                        'role' => 'user',
                        'nama_mahasiswa' => $mahasiswa->nama_mahasiswa,
                    ]);
                    $berhasil++;
                } else {
                    $gagal++;
                }
            } catch (\Exception $e) {
                \Log::error('Error creating user: ' . $e->getMessage());
                $gagal++;
            }
        }

        // Redirect ke halaman user dengan pesan flash
        return redirect()->route('user')->with('flash', [
            'message' => "Berhasil menambahkan $berhasil mahasiswa sebagai user. Gagal: $gagal",
        ]);

    }

}
