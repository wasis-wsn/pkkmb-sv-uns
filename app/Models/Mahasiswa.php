<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_mahasiswa',
        'no_telp',
        'prodi_id',
        'kelompok_id',
    ];
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }
}
