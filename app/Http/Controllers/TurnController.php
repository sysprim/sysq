<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Ticket;
use App\Turn;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class TurnController extends Controller
{


    public function turnCallMe(Request $request){
        
        $turnCall = Turn::with(['clients'])->where('turn_status', 'Llamado')->orderBy('turn_status', 'desc')->get();

        return response()->json(array('call'=>$turnCall,
                                       ));
    }

    public function turnWaiting(Request $request){
        
        $turnWaiting = Turn::with(['clients'])->where('turn_status', 'En Espera')->limit(5)->get();

        return response()->json(array('waiting'=>$turnWaiting,
                                       ));
    }

    public function turnAttending(Request $request){
        
        $turnAttend = Turn::with(['clients'])->where('turn_status', 'Iniciado')->limit(5)->get();

        return response()->json(array('attend'=>$turnAttend,
                                       ));
    }

    public function turnCall(Request $request){

        $id = $request->input('idTurn');

        $turn  = Turn::find($id);
        $turn->turn_status = "Llamado";

        $turn->update();
        
    }

     public function turnStart(Request $request){

        $id = $request->input('idTurn');

        $turn  = Turn::find($id);
        $turn->turn_status = "Iniciado";

        $turn->update();
        
    }

    public function turnFinally(Request $request){

        $id = $request->input('idTurn');

        $turn  = Turn::find($id);
        $turn->turn_status = "Atendido";

        $turn->update();
        
    }

    public function turnCancel(Request $request){

        $id = $request->input('idTurn');

        $turn  = Turn::find($id);
        $turn->turn_status = "Cancelado";

        $turn->update();
        
    }

    public function turnReset(Request $request){

        $turn= Turn::where('turn_status', 'En Espera')->orWhere('turn_status', 'Llamado')->orWhere('turn_status', 'Iniciado')->get();

        foreach ($turn as $turns) {

            $turns->turn_status = "Cancelado";
            $turns->update();
        }
 
    }

    public function turnResetTicket(Request $request){

        $id = $request->input('idReset');

        $turn= Turn::where('ticket_id', $id)->where('turn_status', 'En Espera')->where('ticket_id', $id)->orWhere('turn_status', 'Llamado')->where('ticket_id', $id)->orWhere('turn_status', 'Iniciado')->get();

        foreach ($turn as $turns) {

            $turns->turn_status = "Cancelado";
            $turns->update();
        }
 
    }
    
}
