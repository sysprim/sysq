<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model

{
    protected $table='attentions';

    public function clients(){

        return $this->belongsTo('App\Client', 'client_id');

    }

    public function tickets(){

        return $this->belongsTo('App\Ticket', 'ticket_id');
    }
}
