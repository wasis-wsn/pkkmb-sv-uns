<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'sessions';

    // Disable timestamps
    public $timestamps = false;

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    // If you want to cast the 'last_activity' attribute to a readable format
    protected $casts = [
        'last_activity' => 'datetime',
    ];

    // Define any relationships if needed (not typical for the sessions table)
}
