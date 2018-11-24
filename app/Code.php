<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id','code','status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
