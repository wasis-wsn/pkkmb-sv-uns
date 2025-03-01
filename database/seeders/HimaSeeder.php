<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hima;
use App\Models\User;

class HimaSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        Hima::create([
            'user_id' => $user->id,
            'nama_hima' => 'Emailkomp',
            'logo_hima' => 'emailkom.jpg',
        ]);
        
        Hima::create([
            'user_id' => $user->id,
            'nama_hima' => 'Himama',
            'logo_hima' => 'himama.jpg',
        ]);
    }
}