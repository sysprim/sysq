<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $table='attentions';

    public function turns(){

        return $this->belongsTo('App\Turn', 'turn_id');

    }

    public function tickets(){

        return $this->belongsTo('App\Ticket', 'ticket_id');
    }
}
