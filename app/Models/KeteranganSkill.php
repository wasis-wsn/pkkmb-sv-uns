<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganSkill extends Model
{
    use HasFactory;

    protected $table = 'keterangan';
    protected $fillable = ['deskripsi_skill', 'photo_piagam', 'skill_id', 'mahasiswa_id'];


    public function skill()
    { 
        return $this->belongsTo(Skill::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
