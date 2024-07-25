<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama_mahasiswa' => $row[0] ?? null,
            'no_telp' => $row[1] ?? null,
            'prodi_id' => $row[2] ?? null,
            'kelompok_id' => $row[3] ?? null,            
        ]);
    }
}
