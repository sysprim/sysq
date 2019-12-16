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

          $turns  = Turn::where(['ticket_id'=> $id, 'turn_status'=>'En Espera'])->get();
          $turnFirst  = Turn::where(['ticket_id'=> $id, 'turn_status'=>'En Espera'])->first();
          
          return view('administrator.panel',['ticket'       => $ticket,
                                             'turns'        => $turns ,
                                             'ticketAll'    => $ticketAll,
                                             'first'        => $turnFirst,
                                               ]);
   }

   public function turn(){

          // $turn_history = Turn::where('turn_status','Atendido')->get();
          $turn = new Turn();
          $turnHistory = $turn->where('turn_status','Atendido')->limit(10)->get();

   		    return view('turn.turnPanel', ['history'=>$turnHistory]);
   }

   public function config (){

          $ticket = Ticket::all();
          $user   = User::all();

    return view('administrator.config', ['users' =>$user,
                                         'tickets'=> $ticket]);
}
}
