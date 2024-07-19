<?php

namespace Database\Seeders;

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
            // MahasiswaSeeder::class,
        ]);

        User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role' => 'admin'
        ]);
    }
}
