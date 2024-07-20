<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Acara;
use App\Models\User; // Don't forget to import the User model

class GaleriSeeder extends Seeder
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

        Acara::create([
            'user_id' => $user->id,
            'photo_dokum' => 'photo1.jpg',
            'judul_dokum' => 'Document Title 1',
            'jenis_dokum' => 'Type A',
            'deskripsi_dokum' => 'Description of document 1',
        ]);

        Acara::create([
            'user_id' => $user->id,
            'photo_dokum' => 'photo2.jpg',
            'judul_dokum' => 'Document Title 2',
            'jenis_dokum' => 'Type B',
            'deskripsi_dokum' => 'Description of document 2',
        ]);

        // Add more seed data as needed
    }
}