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
            'username' => $row[0] ?? null,
            'email' => $row[1] ?? null,
            'password' => $row[2] ?? null,
            'role' => $row[3] ?? null,
            'nama_mahasiswa' => $row[4] ?? null,
        ]);
    }
}
