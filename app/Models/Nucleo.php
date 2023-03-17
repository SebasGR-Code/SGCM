<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nucleo extends Model
{
    use HasFactory;

    //Relacion uno a muchos (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos (inversa)
    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
}
