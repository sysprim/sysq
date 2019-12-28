<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\Turn;
use App\Video;
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

    public function queryTurn(){

       $turns  = Turn::with(['clients'])->where('turn_status','En Espera')->get();
       $turnFirst  = Turn::where( 'turn_status','En Espera')->first();

       return response()->json(array('turn' =>$turns,
                                     'first'=>$turnFirst,
                                      ));
    }

   public function selectedPanel($id){

          $ticketAll  = Ticket::all();
          $ticket     = Ticket::find($id);

          // var_dump($turns);
          // die();
          $turnFirst  = Turn::where( 'turn_status','En Espera')->first();


          
          return view('administrator.panel',['ticket'       => $ticket,
                                             'ticketAll'    => $ticketAll,
                                             'first'        => $turnFirst,
                                               ]);
   }

   public function turn(){
         
     $video = Video::all();
     $videoPanel = null;

   	return view('turn.turnPanel', ['video'   =>$video,
                                   'videoPanel'=>$videoPanel]);
   }

   public function config (){

          $ticket = Ticket::all();
          $user   = User::all();

    return view('administrator.config', ['users' =>$user,
                                         'tickets'=> $ticket]);
}
}
