<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokumentasi;
use App\Models\User; // Don't forget to import the User model

class DokumentasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming there are users seeded already, retrieve a user or create one
        $user = User::first(); // Change this to retrieve or create the appropriate user

        Dokumentasi::create([
            'user_id' => $user->id,
            'photo_galeri' => 'photo1.jpg',
        ]);

        // Add more seed data as needed
    }
}