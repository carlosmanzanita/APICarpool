<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinoemergente extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'aventon_id',
        'destino_id',
        'llego'
    ];

    public function destino(){
        return $this->belongsTo(Destino::class);
        // return $this->belongsTo(Destino::class, 'destino_id', 'id');
    }
}
