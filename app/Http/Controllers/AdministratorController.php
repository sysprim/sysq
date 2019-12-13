<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }

   public function index(){

        $ticketFirst = DB::table('tickets')->first();
        $ticketAll = Ticket::all();

       return view('administrator.panel', ['ticketfirst'=>$ticketFirst,
                                           'ticketAll'  =>$ticketAll
                                            ]);
   }

   public function selectedPanel($id){

          $ticket = Ticket::find($id);

          return view('administrator.panel',['ticket_select', ])
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
