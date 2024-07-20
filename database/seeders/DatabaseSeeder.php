<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProdiSeeder::class,
            KelompokSeeder::class,
            MahasiswaSeeder::class,
            DokumentasiSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role' => 'admin',
            "mahasiswa_id" => 1 // ini cuma contoh, sesuaikan dengan id mahasiswa yang ada di database
        ]);
        $this->call([
            SponsorSeeder::class,
            FeedbackSeeder::class,
        ]);
    }
}
