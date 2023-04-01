<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aventon extends Model
{
    use HasFactory;
    protected $fillable = [
        'asientos',
        'confirmar_id',
        'user_id',
        'encuentro_id',
        'destino_id',
        'auto_id',
        'modalidad_id',
    ];

}
