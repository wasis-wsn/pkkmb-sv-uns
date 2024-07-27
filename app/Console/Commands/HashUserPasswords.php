<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HashUserPasswords extends Command
{
    protected $signature = 'users:hash-passwords';
    protected $description = 'Hash passwords for users who have plain text passwords';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::whereNotNull('password')
                     ->whereRaw('LENGTH(password) < 60') // Check if password is not hashed
                     ->get();

        foreach ($users as $user) {
            $user->password = Hash::make($user->password);
            $user->save();
        }

        $this->info('User passwords have been hashed successfully!');
    }
}
