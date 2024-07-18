<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    public function run()
    {
        Sponsor::create([
            'nama_sponsor' => 'BRI',
            'logo_sponsor' => 'BRI.jpg',
        ]);
        
        Sponsor::create([
            'nama_sponsor' => 'BCA',
            'logo_sponsor' => 'BCA.jpg',
        ]);
    }
}