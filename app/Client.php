<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';

    public function turns(){

    	return $this->hasMany('App\Turn');

    }
}
