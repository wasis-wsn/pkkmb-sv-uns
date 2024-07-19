<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use App\Models\User;

class SponsorSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        Sponsor::create([
            'user_id' => $user->id,
            'nama_sponsor' => 'BRI',
            'logo_sponsor' => 'BRI.jpg',
        ]);
        
        Sponsor::create([
            'user_id' =>$user->id,
            'nama_sponsor' => 'BCA',
            'logo_sponsor' => 'BCA.jpg',
        ]);
    }
}