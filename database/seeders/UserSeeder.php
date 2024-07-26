<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve or create a mahasiswa
        $mahasiswa = Mahasiswa::first(); // Change this to retrieve or create the appropriate mahasiswa

        if ($mahasiswa) {
            // User::create([
            //     'name' => 'ppk',
            //     'email' => 'ppk@example.com',
            //     'role' => 'admin',
            //     'password' => Hash::make('123'), // Use Hash::make() for hashing password
            //     'mahasiswa_id' => "2",
            // ]);

            User::create([
                'name' => 'aril',
                'email' => 'aril@example.com',
                'role' => 'User',
                'password' => Hash::make('345'), // Use Hash::make() for hashing password
                'mahasiswa_id' => "4",
            ]);

            // Add more seed data as needed
        } else {
            $this->command->info('No mahasiswa found, please seed mahasiswa table first.');
        }
    }
}
