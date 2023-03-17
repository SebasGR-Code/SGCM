<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    //Relacion uno a uno
    public function cita(){
        return $this->hasOne('App\Models\Cita');
    }

    //Relacion uno a muchos (inversa)
    public function doctor(){
        return $this->belongsTo('App\Models\Doctor');
    }

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
}
