<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\Turn;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }

   public function panel(){

        $ticketAll = Ticket::all();
        $ticket = null;

       return view('administrator.panel', [
                                           'ticketAll'  =>$ticketAll,
                                           'ticket'     =>$ticket
                                            ]);
   }

   public function selectedPanel($id){

          $ticketAll  = Ticket::all();
          $ticket     = Ticket::find($id);

          $turns  = Turn::where('ticket_id', $id)->where('turn_status','En Espera')->orWhere('turn_status','LLamado')->orWhere('turn_status','Iniciado')->where('ticket_id', $id)->get();
          // var_dump($turns);
          // die();
          $turnFirst  = Turn::where('ticket_id', $id)->where( 'turn_status','En Espera')->orWhere('turn_status','LLamado')->orWhere('turn_status','Iniciado')->where('ticket_id', $id)->first();
          
          return view('administrator.panel',['ticket'       => $ticket,
                                             'turns'        => $turns ,
                                             'ticketAll'    => $ticketAll,
                                             'first'        => $turnFirst,
                                               ]);
   }

   public function turn(){

          // $turn_history = Turn::where('turn_status','Atendido')->get();
          $turn = new Turn();
          // $turnCall = $turn->where('turn_status','Llamado')->orderBy('updated_at', 'desc')->get();
          $turnWaiting = $turn->where('turn_status','En Espera')->orderBy('id', 'asc')->limit(5)->get();

   		 return view('turn.turnPanel'/*, [//'call'   =>$turnCall,
              'turnWaiting'=>$turnWaiting]*/);
   }

   public function config (){

          $ticket = Ticket::all();
          $user   = User::all();

    return view('administrator.config', ['users' =>$user,
                                         'tickets'=> $ticket]);
}
}
