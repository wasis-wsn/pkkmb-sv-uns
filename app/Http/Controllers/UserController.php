<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

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
        return Inertia::render('UserView', ['data' => $users]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'role' => 'required|string'
        ]);

        $mahasiswa = Auth::user();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
            'mahasiswa_id' => $mahasiswa ? $mahasiswa->id : null,
        ]);

        return redirect()->route('user');
    }

    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $id->id,
            'role' => 'required|string'
        ]);

        $dataToUpdate = [];

        if ($request->filled('name')) {
            $dataToUpdate['name'] = $request['name'];
        }

        if ($request->filled('email')) {
            $dataToUpdate['email'] = $request['email'];
        }

        if ($request->filled('role')) {
            $dataToUpdate['role'] = $request['role'];
        }

        $id->update($dataToUpdate);

        return redirect()->route('user');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('user');
    }
}
