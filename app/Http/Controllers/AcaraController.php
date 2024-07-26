<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AcaraController extends Controller
{
    public function getAllAcara()
    {
        $galeris = Acara::all();
        return response()->json([
            'data' => $galeris,
        ], 200);
    }

    public function index()
    {
        $galeris = Acara::all();
        return Inertia::render('AcaraView', ['data' => $galeris]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul_dokum' => 'required|string|max:255',
                'deskripsi_dokum' => 'nullable|string',
                'photo_dokum' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
            ]);

            $path = $request->file('photo_dokum');
            $path->storeAs('public/galeri', $request->file('photo_dokum')->hashName());

            $user = Auth::user();

            Acara::create([
                'user_id' => $user->id,
                'photo_dokum' => $path->hashName(),
                'judul_dokum' => $validated['judul_dokum'],
                'deskripsi_dokum' => $validated['deskripsi_dokum'],
            ]);

            // Redirect atau render view tanpa respons JSON
            return redirect()->route('acara')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            // Redirect atau render view dengan pesan error
            return redirect()->route('acara')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, Acara $id)
    {
        $validated = $request->validate([
            'judul_dokum' => 'nullable|string|max:255',
            'deskripsi_dokum' => 'nullable|string',
            'photo_dokum' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        $dataToUpdate = [];

        if ($request->filled('judul_dokum')) {
            $dataToUpdate['judul_dokum'] = $validated['judul_dokum'];
        }

        if ($request->filled('deskripsi_dokum')) {
            $dataToUpdate['deskripsi_dokum'] = $validated['deskripsi_dokum'];
        }

        if ($request->hasFile('photo_dokum')) {
            $path = $request->file('photo_dokum');
            $fileName = $path->hashName();
            $path->storeAs('public/galeri', $fileName);
            $dataToUpdate['photo_dokum'] = $fileName;
        }

        $id->update($dataToUpdate);

        // Redirect atau render view tanpa respons JSON
        return redirect()->route('acara')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $galeri = Acara::findOrFail($id);
        $galeri->delete();

        // Redirect atau render view tanpa respons JSON
        return redirect()->route('acara')->with('success', 'Data berhasil dihapus');
    }
}
