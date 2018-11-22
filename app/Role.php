<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const LIDER = 1;
    const PATA = 2;


    public function users()
    {
        return $this->hasMany('App\User');
    }

}
