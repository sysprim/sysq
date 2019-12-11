<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    public function cliente(){

    	return $this->belongsTo('App\Cliente');

    }

    public function turno(){

    	return $this->belongsTo('App\Taquilla');

    }
}
