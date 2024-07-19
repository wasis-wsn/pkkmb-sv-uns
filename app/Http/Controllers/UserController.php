<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|string|lowercase|email|max:255|unique:',
            'password' => 'required|string',
            'role' => 'required|string'
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'mahasiswa_id' => $request -> mahasiswa,
        ]);

        return redirect(route('user', absolute: false));
    }


    public function update(Request $request, User $user)
    {
        Log::info('Update method called');
        Log::info('Request data: ' . json_encode($request->all()));

        $request->validate([
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'
        ]);

        Log::info('Validated data: ' . json_encode($request));

        $dataToUpdate = [];

        if ($request->filled('email')) {
            $dataToUpdate['email'] = $request['email'];
        }

        if ($request->filled('password')) {
            $dataToUpdate['password'] = $request['password'];
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
