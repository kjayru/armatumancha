<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const GIGAS = 'gigas';
    const MILLAS = 'millas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias','numero','email','beneficio','role_id'
    ];



    public function groups(){
        return $this->belongsToMany('App\Group');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function codes(){
        return $this->hasMany('App\Code');
    }
    public static function  reemplazar($cadena){
       // $numero = strlen $cadena;
    }
}
