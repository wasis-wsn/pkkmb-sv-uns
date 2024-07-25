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
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function getAllMahasiswa()
    {
        $mahasiswa = Mahasiswa::with('prodi', 'kelompok')->get();
        $prodi = Prodi::all();
        $kelompok = Kelompok::all();
        return response()->json([
            'data' => $mahasiswa,
            'prodi' => $prodi,
            'kelompok' => $kelompok
        ], 200);
    }

    public function mahasiswaExport() 
    {
        return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
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
                'prodi_id' => 'required|exists:prodi,id',
                'kelompok_id' => 'required|exists:kelompok,id',
            ]);


            Mahasiswa::create([
                'nama_mahasiswa' => $validated['nama_mahasiswa'],
                'no_telp' => $validated['no_telp'],
                'prodi_id' => (int) $validated['prodi_id'],
                'kelompok_id' => (int) $validated['kelompok_id'],
            ]);

            return redirect()->route('mahasiswa');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function update(Request $request, Mahasiswa $id)
    {
        $validated = $request->validate([
            'nama_mahasiswa' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:15',
            'prodi_id' => 'nullable|string',
            'kelompok_id' => 'nullable|string',
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
        $id->update($dataToUpdate);

        return redirect()->route('mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);

        return redirect()->route('mahasiswa');
    }
}
