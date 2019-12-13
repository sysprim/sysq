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

    public function detail($id){

        $ticket = Ticket::find($id);

        return view('ticket.ticketDetail', ['ticket'=>$ticket]);
    }

    public function update (Request $request){

        $id = $request->input('id');

        $ticket = Ticket::find($id);

        $validate = $this->validate($request, ['name_ticket'=> 'required']);

        $name       = $request->input('name_ticket');
        $description= $request->input('description_ticket');

        $ticket->name_ticket = $name;
        $ticket->description_ticket = $description;

        $ticket->update();

        //return redirect()->route('config')->with(['message'=>'Taquilla Actualizada']);

    }

    public function delete(Request $request){

        $id = $request->input('id');

        $ticket = Ticket::find($id);
        $ticket->delete();
        
        return redirect()->route('config')->with(['message', 'Taquilla Eliminada']);
    }
}
