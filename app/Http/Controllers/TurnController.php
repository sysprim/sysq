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
        
        return view('turn.turnSelect', ['ci'     =>$ci,
                                        'tickets'=>$tickets]);
   	
    }

    public function turnTicket($ci, $id){
        
        $ci = $ci;
        $id = $id;

        return view('turn.turnType', ['ci'=> $ci, 'id'=>$id]);
    }
    
}
