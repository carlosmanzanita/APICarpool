<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aventon extends Model
{
    use HasFactory;
    protected $fillable = [
        'asientos',
        'user_id',
        'encuentro_id',
        'destino_id',
        'auto_id',
        'modalidad_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function encuentro(){
        return $this->belongsTo(Encuentro::class);
    }
    public function destino(){
        return $this->belongsTo(Destino::class);
    }
    public function auto(){
        return $this->belongsTo(Auto::class);
    }
    public function modalidad(){
        return $this->belongsTo(Modalidad::class);
    }
    public function aventonTag(){
        return $this->hasMany(AventonTag::class);
    }   
}
