<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    public function turno(){

    	return $this->hasMany('App\Turno');

    }
}
