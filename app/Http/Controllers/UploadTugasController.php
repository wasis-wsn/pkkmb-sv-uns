<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UploadTugasController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi input
        $request->validate([
            'files.*' => 'required|file', // Validasi untuk file
        ]);

        $user = Auth::user(); // Dapatkan pengguna yang sedang login
        $mahasiswa = $user->mahasiswa; // Dapatkan data mahasiswa terkait
        $namaMahasiswa = $mahasiswa->nama_mahasiswa; // Dapatkan nama mahasiswa

        $kelompok = $mahasiswa->kelompok->nama_kelompok; // Ambil informasi kelompok
        $folderPath =  $kelompok; // Buat path folder berdasarkan kelompok

        $filePaths = []; // Array untuk menyimpan path file yang diunggah

        // Proses setiap file yang diunggah
        foreach ($request->file('files') as $file) {
            // Buat nama file yang baru
            $newFileName = $kelompok . '_' . $namaMahasiswa . '.' . $file->getClientOriginalExtension();

            // Simpan file ke folder yang sesuai dengan kelompok dan ambil pathnya
            $filePath = $file->storeAs($folderPath, $newFileName, 'google');
            $filePaths[] = $filePath;
        }

        // Simpan informasi kelompok dan file ke database atau lakukan proses lain yang diperlukan
        // Misalnya: $this->saveFilesAndKelompok($filePaths, $kelompok);

        return response()->json(['success' => true, 'message' => 'Files uploaded successfully', 'filePaths' => $filePaths]);
    }
}
