<?php

namespace App\Http\Controllers;

use App\Attention;
use Illuminate\Http\Request;
use App\Ticket;
use App\Client;

class AttentionController extends Controller
{
    public function save(Request $request){

        $idTurn = $request->input('idTurn');
        $idTicket = $request->input('idTicket');

        $attention = new Attention();

        $attention->turn_id = $idTurn;
        $attention->ticket_id = $idTicket;

        $attention->save();
    }
}
