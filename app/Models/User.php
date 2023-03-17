<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token){
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion uno a uno
    public function doctor(){
        return $this->hasOne('App\Models\Doctor');
    }

    public function paciente(){
        return $this->hasOne('App\Models\Paciente');
    }

    public function admin(){
        return $this->hasOne('App\Models\Admin');
    }

    //Relacion uno a muchos
    public function records(){
        return $this->hasMany('App\Models\Record');
    }

    public function familiares(){
        return $this->hasMany('App\Models\Nucleo');
    }
}
