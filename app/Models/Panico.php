<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panico extends Model
{
    use HasFactory;
    protected $fillable = [
        'hora',
        'ubicacion',
        'user_id'   
    ];
}
