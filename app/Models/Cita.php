<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    static $rules = [
        'start' => 'required',
        'end' => 'required',
        'doctor_id' => 'required',
        'paciente_id' => 'required',
    ];

    //Relacion uno a uno (inversa)
    public function solicitud(){
        return $this->belongsTo('App\Models\Solicitud');
    }

    //Relacion uno a muchos (inversa)
    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor');
    }

    public function general(){
        return $this->hasOne('App\Models\General');
    }
}
