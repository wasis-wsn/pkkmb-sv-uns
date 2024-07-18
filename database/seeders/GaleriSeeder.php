<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        Galeri::create([
            'judul' => 'Sample Galeri 1',
            'deskripsi' => 'This is a sample description for Galeri 1',
            'jenis' => 'Galeri1',
            'file' => 'sample1.jpg',
        ]);

        Galeri::create([
            'judul' => 'Sample Galeri 2',
            'deskripsi' => 'This is a sample description for Galeri 2',
            'jenis' => 'Galeri2',
            'file' => 'sample2.jpg',
        ]);

        Galeri::create([
            'judul' => 'Sample Slide',
            'deskripsi' => 'This is a sample description for Slide',
            'jenis' => 'Slide',
            'file' => 'sample3.jpg',
        ]);
    }
}
