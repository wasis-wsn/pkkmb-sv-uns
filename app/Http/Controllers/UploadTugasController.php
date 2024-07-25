<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadTugasController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi input
        $request->validate([
            'files.*' => 'required|file', // Validasi untuk file
        ]);

        $filePaths = []; // Array untuk menyimpan path file yang diunggah

        // Proses setiap file yang diunggah
        foreach ($request->file('files') as $file) {
            // Simpan file dan ambil pathnya
            $filePath = $file->store('PKKMB', 'google');
            $filePaths[] = $filePath;
        }

        // Simpan informasi kelompok dan file ke database atau lakukan proses lain yang diperlukan
        // Misalnya: $this->saveFilesAndKelompok($filePaths, $kelompok);

        return response()->json(['success' => true, 'message' => 'Files uploaded successfully', 'filePaths' => $filePaths]);
    }
}
