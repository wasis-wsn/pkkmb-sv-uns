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
use App\Imports\MahasiswaImport;
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

    public function mahasiswaImport(Request $request)
    {
        try {
            // Validate the file
            $request->validate([
                'file_mahasiswa' => 'required|file|mimes:xlsx,xls',
            ]);

            $file = $request->file('file_mahasiswa');
            $namaFile = $file->getClientOriginalName();
            $file->move('DataMahasiswa', $namaFile);

            // Import the data
            Excel::import(new MahasiswaImport, public_path('/DataMahasiswa/'.$namaFile));
            return redirect('/dashboard/mahasiswa')->with('success', 'Data berhasil diimport');
        } catch (\Exception $e) {
            // Optionally, you can return the error message for debugging purposes
            return redirect('/dashboard/mahasiswa')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
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
                'nama_prodi' => 'required|exists:prodi,nama_prodi',
                'nama_kelompok' => 'required|exists:kelompok,nama_kelompok',
            ]);


            Mahasiswa::create([
                'nama_mahasiswa' => $validated['nama_mahasiswa'],
                'no_telp' => $validated['no_telp'],
                'nama_prodi' => $validated['nama_prodi'],
                'nama_kelompok' => $validated['nama_kelompok'],
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
            'nama_prodi' => 'nullable|string',
            'nama_kelompok' => 'nullable|string',
        ]);

        $dataToUpdate = [];

        if ($request->filled('nama_mahasiswa')) {
            $dataToUpdate['nama_mahasiswa'] = $validated['nama_mahasiswa'];
        }

        if ($request->filled('no_telp')) {
            $dataToUpdate['no_telp'] = $validated['no_telp'];
        }

        if ($request->filled('nama_prodi')) {
            $dataToUpdate['nama_prodi'] = $validated['nama_prodi'];
        }

        if ($request->filled('nama_kelompok')) {
            $dataToUpdate['nama_kelompok'] = $validated['nama_kelompok'];
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
