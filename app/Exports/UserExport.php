<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('username', 'email', 'role', 'nama_mahasiswa')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Username',
            'Email',
            'Role',
            'Nama Mahasiswa',
        ];
    }
}
