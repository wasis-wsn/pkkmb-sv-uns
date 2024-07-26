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
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        $this->call([
            ProdiSeeder::class,
            KelompokSeeder::class,
            MahasiswaSeeder::class,
            DokumentasiSeeder::class,
            SponsorSeeder::class,
            FeedbackSeeder::class,
            MateriSeeder::class,
        ]);
    }
}
