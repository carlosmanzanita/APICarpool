<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinoemergente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'tipo',
        'baja',
        'user_id',
        
    ];
}
