<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluated extends Model
{
    public $timestamps = false;
    protected $table="evaluated2";

    protected $fillable = ['idlinea','idmancha','califica','tipocalifica','fechacalifica'];

}
