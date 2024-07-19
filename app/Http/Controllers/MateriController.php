<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Auth;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::all();
        return Inertia::render('MateriView', ['data' => $materis]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul_materi' => 'required|string|max:255',
                'deskripsi_materi' => 'required|string',
                'isi_materi' => 'required|string',
            ]);

            $user = Auth::user();

            Materi::create([
                'user_id' => $user->id,
                'judul_materi' => $validated['judul_materi'],
                'deskripsi_materi' => $validated['deskripsi_materi'],
                'isi_materi' => $validated['isi_materi']
            ]);

            return redirect()->route('materi');
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

    public function update(Request $request, Materi $materi)
    {
        
        \Log::info('Update method called');
        \Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
            'judul_materi' => 'nullable|string|max:255',
                'deskripsi_materi' => 'nullable|string',
                'isi_materi' => 'nullable|string',
        ]);

        \Log::info('Validated data: ' . json_encode($validated));

        $dataToUpdate = [];

        if ($request->filled('judul_materi')) {
            $dataToUpdate['judul_materi'] = $validated['judul_materi'];
        }

        if ($request->filled('deskripsi_materi')) {
            $dataToUpdate['deskripsi_materi'] = $validated['deskripsi_materi'];
        }

        if ($request->filled('isi_materi')) {
            $dataToUpdate['isi_materi'] = $validated['isi_materi'];
        }


        \Log::info('Data to update: ' . json_encode($dataToUpdate));

        $materi->update($dataToUpdate);

        \Log::info('Update completed');

        return redirect()->route('materi');
    }

    public function destroy($id)
    {
        // Your deletion logic here
        Materi::destroy($id);

        // Return a valid Inertia response
        return redirect()->route('materi');
    }

}
