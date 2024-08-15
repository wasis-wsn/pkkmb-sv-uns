<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    protected $table = 'sertifikat_mahasiswa';
    protected $fillable = ['nama_mahasiswa', 'nama_file'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nama_mahasiswa', 'nama_mahasiswa');
    }
}
