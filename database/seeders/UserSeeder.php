<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        // Array of sample users
        $users = [
            [
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
            [
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role' => 'user'
            ],
        ];

        // Insert each user into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
