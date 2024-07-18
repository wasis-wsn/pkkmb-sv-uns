<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User; // Don't forget to import the User model
use Illuminate\Support\Facades\Redirect;

use Auth;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return Inertia::render('GaleriView', ['data' => $galeris]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul_dokum' => 'required|string|max:255',
                'deskripsi_dokum' => 'nullable|string',
                'jenis_dokum' => 'required|string|max:255',
                'photo_dokum' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
            ]);

            $path = $request->file('photo_dokum');
            $path->storeAs('public/galeri', $request->file('photo_dokum')->hashName());

            $user = Auth::user(); // Change this to retrieve or create the appropriate user

            Galeri::create([
                'user_id' => $user->id,
                'photo_dokum' => $path->hashName(),
                'judul_dokum' => $validated['judul_dokum'],
                'deskripsi_dokum' => $validated['deskripsi_dokum'],
                'jenis_dokum' => $validated['jenis_dokum']
            ]);

            return redirect()->route('galeri');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // public function update(Request $request, Galeri $galeri)
    // {
    //     $validated = $request->validate([
    //         'judul_dokum' => 'required|string|max:255',
    //         'deskripsi_dokum' => 'nullable|string',
    //         'jenis_dokum' => 'required|string|max:255',
    //         'photo_dokum' => 'nullable|file|max:10240'
    //     ]);

    //     if ($request->hasFile('photo_dokum')) {
    //         $path = $request->file('photo_dokum')->store('galeri', 'public');
    //         $galeri->photo_dokum = $path;
    //     }

    //     $galeri->update([
    //         'judul_dokum' => $validated['judul_dokum'],
    //         'deskripsi_dokum' => $validated['deskripsi_dokum'],
    //         'jenis_dokum' => $validated['jenis_dokum']
    //     ]);

    //     return redirect()->route('galeri');
    // }

    public function update(Request $request, Galeri $galeri)
    {
        \Log::info('Update method called');
        \Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
            'judul_dokum' => 'nullable|string|max:255',
            'deskripsi_dokum' => 'nullable|string',
            'jenis_dokum' => 'nullable|string|max:255',
            'photo_dokum' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        \Log::info('Validated data: ' . json_encode($validated));

        $dataToUpdate = [];

        if ($request->filled('judul_dokum')) {
            $dataToUpdate['judul_dokum'] = $validated['judul_dokum'];
        }

        if ($request->filled('deskripsi_dokum')) {
            $dataToUpdate['deskripsi_dokum'] = $validated['deskripsi_dokum'];
        }

        if ($request->filled('jenis_dokum')) {
            $dataToUpdate['jenis_dokum'] = $validated['jenis_dokum'];
        }

        if ($request->hasFile('photo_dokum')) {
            \Log::info('File uploaded');
            $path = $request->file('photo_dokum');
            $fileName = $path->hashName();
            $path->storeAs('public/galeri', $fileName);
            $dataToUpdate['photo_dokum'] = $fileName;
            \Log::info('File stored as: ' . $fileName);
        } else {
            \Log::info('No file uploaded');
        }

        \Log::info('Data to update: ' . json_encode($dataToUpdate));

        $galeri->update($dataToUpdate);

        \Log::info('Update completed');

        return redirect()->route('galeri');
    }

    public function destroy($id)
    {
        // Your deletion logic here
        Galeri::destroy($id);

        // Return a valid Inertia response
        return redirect()->route('galeri');
    }

}
