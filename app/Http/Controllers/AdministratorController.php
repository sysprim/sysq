<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\Turn;
use App\Client;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }

   public function panel(){

     //    $ticketFirst = DB::table('tickets')->first();
        $ticketAll = Ticket::all();
        $ticket = null;

     //    $turns= Turn::where('ticket_id', $ticketFirst->id)->get();


       return view('administrator.panel', [
                                           'ticketAll'  =>$ticketAll,
                                           'ticket'     =>$ticket
                                            ]);
   }

   public function selectedPanel($id){

          $ticketAll = Ticket::all();
          $ticket = Ticket::find($id);

          // $turn = new Turn ();
          // $filter = $turn->all()->where(['ticket_id'=> $id, 'turn_status'=>'En Espera' ]);
          
          // $clients = new Client();
          // $client  = $clients->all()->where('id', $filter->cliente_id);
          // // var_dump($filter);
          // // die();
           $turns  = Turn::where(['ticket_id'=> $id, 'turn_status'=>'En Espera'])->get();
          
          return view('administrator.panel',['ticket'       => $ticket,
                                             'turns'        => $turns ,
                                             'ticketAll'    => $ticketAll
                                               ]);
   }

   public function turn(){
   	
   		return view('turn.turnPanel');
   }

   public function config (){

          $ticket = Ticket::all();
          $user   = User::all();

    return view('administrator.config', ['users' =>$user,
                                         'tickets'=> $ticket]);
}
}
