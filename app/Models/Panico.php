<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panico extends Model
{
    use HasFactory;
    protected $fillable = [
        'hora',
        'latitud',
        'longitud',
        'user_id'   
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
