<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function turn(){

    	return $this->hasMany('App\Turn');

    }
}
