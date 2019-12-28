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

        $validate = $this->validate($request, [ 'number_ticket'=>'required|integer|unique:tickets',                                             
                                                ]);
        
        
        $number         = $request->input('number_ticket');
        $description    = $request->input('description_ticket');

        $ticket = new Ticket();
        $ticket->number_ticket      = $number;
        $ticket->description_ticket = $description;

        $ticket->save();

        return redirect()->route('config')->with(['message'=>'Taquilla Registrada']);
    }

    public function detail($id){

        $ticket = Ticket::find($id);

        return view('ticket.ticketDetail', ['ticket'=>$ticket]);
    }

    public function update (Request $request){

        $id = $request->input('id');

        $ticket = Ticket::find($id);


        $description    = $request->input('description_ticket');

        $ticket->description_ticket = $description;

        $ticket->update();

        return redirect()->route('config')->with(['message'=>'Taquilla Actualizada']);

    }

    public function delete(Request $request){

        $id = $request->input('id');

        $ticket = Ticket::find($id);
        $ticket->delete();
        
        return redirect()->route('config')->with(['message', 'Taquilla Eliminada']);
    }

    public function statusTicket($id, $status){

        $ticket = Ticket::find($id);

        $ticket->status_ticket = $status;

        $ticket->update();

        return redirect()->route('config')->with(['message'=>'Estado de la taquilla Actualizado']);
    }
}
