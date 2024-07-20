<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class MahasiswaController extends Controller
{
    public function getAllMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelompok = Kelompok::all();
        return response()->json([
            'data' => $mahasiswa,
            'prodi' => $prodi,
            'kelompok' => $kelompok
        ], 200);   
    }

    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi', 'kelompok')->get();
        $prodi = Prodi::all();
        $kelompok = Kelompok::all();
        return Inertia::render('MahasiswaView', [
            'data' => $mahasiswas,
            'prodi' => $prodi,
            'kelompok' => $kelompok
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_mahasiswa' => 'required|string|max:255',
                'no_telp' => 'required|string|max:15',
                'prodi_id' => 'required|string',
                'kelompok_id' => 'required|string',
                'nama_skill' => 'nullable|string|max:255',
                'deskripsi_skill' => 'nullable|string',
                'photo_piagam' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
            ]);
    
            $path = $request->file('photo_piagam') ? $request->file('photo_piagam')->store('public/piagam') : null;
    
            $user = Auth::user();
    
            Mahasiswa::create([
                'nama_mahasiswa' => $validated['nama_mahasiswa'],
                'no_telp' => $validated['no_telp'],
                'prodi_id' => $validated['prodi_id'],
                'kelompok_id' => $validated['kelompok_id'],
                'nama_skill' => $validated['nama_skill'],
                'deskripsi_skill' => $validated['deskripsi_skill'],
                'photo_piagam' => $path ? basename($path) : null,
                'user_id' => $user->id,
            ]);
    
            return redirect()->route('mahasiswa');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nama_mahasiswa' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:15',
            'prodi_id' => 'nullable|string',
            'kelompok_id' => 'nullable|string',
            'nama_skill' => 'nullable|string|max:255',
            'deskripsi_skill' => 'nullable|string',
            'photo_piagam' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        $dataToUpdate = [];

        if ($request->filled('nama_mahasiswa')) {
            $dataToUpdate['nama_mahasiswa'] = $validated['nama_mahasiswa'];
        }

        if ($request->filled('no_telp')) {
            $dataToUpdate['no_telp'] = $validated['no_telp'];
        }

        if ($request->filled('prodi_id')) {
            $dataToUpdate['prodi_id'] = $validated['prodi_id'];
        }

        if ($request->filled('kelompok_id')) {
            $dataToUpdate['kelompok_id'] = $validated['kelompok_id'];
        }

        if ($request->filled('nama_skill')) {
            $dataToUpdate['nama_skill'] = $validated['nama_skill'];
        }

        if ($request->filled('deskripsi_skill')) {
            $dataToUpdate['deskripsi_skill'] = $validated['deskripsi_skill'];
        }

        if ($request->hasFile('photo_piagam')) {
            $path = $request->file('photo_piagam');
            $fileName = $path->hashName();
            $path->storeAs('public/piagam', $fileName);
            $dataToUpdate['photo_piagam'] = $fileName;
        }

        $mahasiswa->update($dataToUpdate);

        return redirect()->route('mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);

        return redirect()->route('mahasiswa.index');
    }
}
