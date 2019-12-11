<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taquilla extends Model
{
   
	public function turno(){

    	return $this->hasMany('App\Turno');

    } 

}
