<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function getAllGaleri()
    {
        $galeris = Galeri::all();
        // Hapus respons JSON dan kembalikan data ke view atau gunakan dengan cara lain
        return Inertia::render('GaleriList', ['data' => $galeris]);
    }

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

            $user = Auth::user();

            Galeri::create([
                'user_id' => $user->id,
                'photo_dokum' => $path->hashName(),
                'judul_dokum' => $validated['judul_dokum'],
                'deskripsi_dokum' => $validated['deskripsi_dokum'],
                'jenis_dokum' => $validated['jenis_dokum']
            ]);

            // Redirect atau render view tanpa respons JSON
            return redirect()->route('galeri.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            // Redirect atau render view dengan pesan error
            return redirect()->route('galeri.index')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, Galeri $id)
    {
        $validated = $request->validate([
            'judul_dokum' => 'nullable|string|max:255',
            'deskripsi_dokum' => 'nullable|string',
            'jenis_dokum' => 'nullable|string|max:255',
            'photo_dokum' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

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
            $path = $request->file('photo_dokum');
            $fileName = $path->hashName();
            $path->storeAs('public/galeri', $fileName);
            $dataToUpdate['photo_dokum'] = $fileName;
        }

        $id->update($dataToUpdate);

        // Redirect atau render view tanpa respons JSON
        return redirect()->route('galeri.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        // Redirect atau render view tanpa respons JSON
        return redirect()->route('galeri.index')->with('success', 'Data berhasil dihapus');
    }
}
