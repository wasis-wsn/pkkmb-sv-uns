<?php
// app/Http/Controllers/SertifikatController.php
namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Kelompok;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Mahasiswa;
use App\Models\Sertifikat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SertifikatController extends Controller
{
    public function index()
    {
        $kelompok = Kelompok::all();
        return Inertia::render('SertifikatView', [
            'kelompok' => $kelompok,
        ]);
    }

    // app/Http/Controllers/SertifikatController.php
    public function generateSertifikat(Request $request)
    {
        $namaKelompok = $request->input('nama_kelompok');
        $mahasiswa = Mahasiswa::where('nama_kelompok', $namaKelompok)->get();

        foreach ($mahasiswa as $mhs) {
            if (Sertifikat::where('nama_mahasiswa', $mhs->nama_mahasiswa)->exists()) {
                continue;
            }
            $pdf = Pdf::loadView('sertifikat.template', ['mahasiswa' => $mhs]);
            $filename = 'sertifikat_' . str_replace(' ', '_', $mhs->nama_mahasiswa) . '.pdf';
            $pdf->setPaper([0, 0, 580, 750], 'landscape');
            $pdf->save(storage_path("app/public/sertifikat/{$filename}"));
            Sertifikat::create([
                'nama_mahasiswa' => $mhs->nama_mahasiswa,
                'nama_file' => $filename,
            ]);
        }


        return response()->json(['message' => 'Sertifikat berhasil dibuat']);
    }
}
