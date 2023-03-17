<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    //Relacion uno a uno (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos
    public function citas(){
        return $this->hasMany('App\Models\Cita');
    }
}
