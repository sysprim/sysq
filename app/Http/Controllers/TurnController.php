<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turn;
use App\Attention;
use App\Client;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class TurnController extends Controller
{


    public function turnCallMe(Request $request){

        $query = DB::select("SELECT * FROM attentions INNER JOIN turns ON attentions.turn_id = turns.id 
                                        INNER JOIN tickets ON attentions.ticket_id = tickets.id 
                                        INNER JOIN clients ON turns.client_id = clients.id WHERE turn_status = 'Llamado'");


        foreach ($query as $turnCall){
                $call[]=$turnCall;
            }

        return response()->json(array('call'=>$call,
                                       ));
    }

    public function turnWaiting(Request $request){

        $turnWaiting = Turn::with(['clients'])->where('turn_status', 'En Espera')->limit(5)->get();

        return response()->json(array('waiting'=>$turnWaiting,
                                       ));
    }

    public function turnAttending(){
        $query = DB::select("SELECT * FROM attentions INNER JOIN turns ON attentions.turn_id = turns.id 
                                        INNER JOIN tickets ON attentions.ticket_id = tickets.id 
                                        INNER JOIN clients ON turns.client_id = clients.id WHERE turn_status = 'Iniciado'");


        foreach ($query as $turnAttend){
            $attend[]=$turnAttend;
        }
        return response()->json(array('attend'=>$attend,
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
