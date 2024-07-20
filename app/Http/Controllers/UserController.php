<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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

    Log::info('Validated Data: ', $validatedData);

    $mahasiswa = Auth::user();

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'role' => $validatedData['role'],
        'mahasiswa_id' => $mahasiswa->id,
    ]);

    Log::info('User Created: ', $user->toArray());

    return redirect()->route('user.index');
}



    public function update(Request $request, User $user)
    {
        Log::info('Update method called');
        Log::info('Request data: ' . json_encode($request->all()));

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string'
        ]);


        Log::info('Validated data: ' . json_encode($request));

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

        Log::info('Data to update: ' . json_encode($dataToUpdate));

        $user->update($dataToUpdate);

        Log::info('Update completed');

        return redirect()->route('user');
    }
    public function destroy($id)
    {
        // Your deletion logic here
        User::destroy($id);

        // Return a valid Inertia response
        return redirect()->route('user');
    }
}
