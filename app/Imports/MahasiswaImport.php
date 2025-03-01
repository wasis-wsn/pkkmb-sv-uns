<?php
namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama_mahasiswa' => $row[0] ?? null,
            'no_telp' => $row[1] ?? null,
            'nama_prodi' => $row[2] ?? null,
            'nama_kelompok' => $row[3] ?? null,
        ]);
    }
}
