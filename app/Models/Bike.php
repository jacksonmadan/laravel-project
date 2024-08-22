<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    protected $table='bikes';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'name',
        'image_url',
        'rate_per_hour',
        'cc',
        'weight',
        'description',
    ];


}
