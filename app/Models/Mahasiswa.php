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
        'nama_prodi',
        'nama_kelompok',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'nama_prodi', 'nama_prodi');
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'nama_kelompok', 'nama_kelompok');
    }
    
    public function users()
    {
        return $this->hasMany(User::class, 'nama_mahasiswa', 'nama_mahasiswa');
    }

    public function keteranganSkills()
    {
        return $this->hasMany(KeteranganSkill::class, 'mahasiswa_id');
    }
}
