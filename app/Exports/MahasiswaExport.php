<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Mahasiswa::with('prodi', 'kelompok')->get()->map(function ($mahasiswa) {
            return [
                'nama_mahasiswa' => $mahasiswa->nama_mahasiswa,
                'no_telp' => $mahasiswa->no_telp,
                'nama_prodi' => $mahasiswa->prodi ? $mahasiswa->prodi->nama_prodi : null,
                'nama_kelompok' => $mahasiswa->kelompok ? $mahasiswa->kelompok->nama_kelompok : null,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Mahasiswa',
            'No Telp',
            'Prodi',
            'Kelompok'
        ];
    }
}
