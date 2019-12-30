<?php

namespace App\Http\Controllers;

use App\Attention;
use Illuminate\Http\Request;
use App\Ticket;
use App\Client;

class AttentionController extends Controller
{
    public function save(Request $request){

        $idClient = $request->input('idClient');
        $idTicket = $request->input('idTicket');

        $attention = new Attention();

        $attention->client_id = $idClient;
        $attention->ticket_id = $idTicket;

        $attention->save();
    }
}
