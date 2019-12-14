<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Ticket;

class TurnController extends Controller
{


    public function index($ci){

        $ci = $ci;

        $tickets = Ticket::all();
        
        return view('turn.turnSelect', ['tickets'=>$tickets]);
   	
    }
    
}
