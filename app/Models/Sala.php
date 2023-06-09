<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    //Relacion uno a uno (inversa)
    public function doctor(){
        return $this->hasOne('App\Models\Doctor');
    }
}
