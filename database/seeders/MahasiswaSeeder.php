<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'nama_mahasiswa' => 'Muhammad Raihan',
            'no_telp' => '',
            'prodi_id' => 1,
            'kelompok_id' => 1,
        ]);
    }
}
