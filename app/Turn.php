<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    public function client(){

    	return $this->belongsTo('App\Client');

    }

    public function turn(){

    	return $this->belongsTo('App\Ticket');

    }
}
