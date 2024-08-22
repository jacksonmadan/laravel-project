<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Explicitly specify the table name if it's not the plural form
    protected $table = 'user';
    protected $primaryKey = 'user_id'; // Change to your actual primary key column name
    public $incrementing = true;


    protected $fillable = [
        'name',
        'email',
        'address',
        'dob',
        'gender',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'date',
        'password' => 'hashed',
    ];
}
