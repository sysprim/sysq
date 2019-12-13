<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index(){

    }

    public function register(){
        return view('ticket.ticketRegister');
    }

    public function save(Request $request){    

        $validate = $this->validate($request, ['name_ticket'=>'required',
                                                ]);
        
        $ticket = new Ticket();
        $name           = $request->input('name_ticket');
        $description    = $request->input('description_ticket');

        $ticket->name_ticket        = $name;
        $ticket->description_ticket = $description;

        $ticket->save();

        return redirect()->route('config')->with(['message'=>'Taquilla Registrada']);
    }
}
