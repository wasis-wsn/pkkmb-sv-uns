<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LinkMateri;
use App\Models\User;

class LinkMateriSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        LinkMateri::create([
            'user_id' => $user->id,
            'judul_file' => 'Buku Implementasi Nilai Askara Muda',
            'link_drive' => 'https://drive.google.com/file/d/1Z2uPvLgO2ECDyT9ku2SqoE9-VKtdV2Zc/view',
        ]);
        
        LinkMateri::create([
            'user_id' => $user->id,
            'judul_file' => 'Buku Panduan Umum PKKMB',
            'link_drive' => 'https://drive.google.com/file/d/1l2A8tjzykIn0CPFGRBSmGFavcA0CbucP/view',
        ]);
    }
}