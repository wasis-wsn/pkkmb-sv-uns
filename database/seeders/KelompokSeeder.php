<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelompok')->insert([
            ['nama_kelompok' => 'Kelompok 1'],
            ['nama_kelompok' => 'Kelompok 2'],
            ['nama_kelompok' => 'Kelompok 3']
        ]);
    }
}
