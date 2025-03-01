<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gardana extends Model
{
    use HasFactory;
    
    protected $table = 'gardana';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_gardana',
        'link_wa',
    ];

        public function kelompok()
    {
        return $this->hasMany(Kelompok::class);
    }
}
