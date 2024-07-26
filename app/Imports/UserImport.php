<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0] ?? null,
            'email' => $row[1] ?? null,
            'password' => $row[2] ?? null,
            'role' => $row[3] ?? null,
            'mahasiswa_id' => $row[4] ?? null,
            'unseen_messages' => $row[5] ?? null,
            'last_sender' => $row[6] ?? null,
        ]);
    }
}
