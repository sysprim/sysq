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


    public function index($ci){

        $ci = $ci;
        $tickets = Ticket::all();
        
        return view('turn.turnSelect', ['ci'     =>$ci,
                                        'tickets'=>$tickets]);	
    }

    public function turnTicket($ci, $id){
        
        $ci = $ci;
        $id = $id;

        return view('turn.turnType', ['ci'=> $ci, 'id'=>$id]);
    }

    public function generatedNumberTurn()
    {
        $random_code = Turn::orderBy('random_code', 'desc')->first();

        if ($random_code != null) {
            
            $number = explode('-', $random_code->random_code);//LUEGO SOLO BUSCO LO NUMEROS
            $number_integer = (int)$number[1];// [1] LOS COVIERTOS A UN ENTERO PARA PORDER SUMARLA 1 Y SEGUIR LA SECUENCIA
            $number_generated = strtoupper('S' . "-" . str_pad($number_integer + 1, 4, '0', STR_PAD_LEFT));
            return $number_generated;
        
        } else {
            $number_generated = strtoupper('S' . "-" . str_pad(1, 4, '0', STR_PAD_LEFT));
            return $number_generated;
        }
    }

    public function save($ci, $id, $turn){

        $client_id  = $ci;
        $ticket_id  = $id;
        $turn_type  = $turn;

        $generatedTurn  = new Turn();
        $turnController = new TurnController();

        $generatedTurn->random_code = $turnController->generatedNumberTurn();
        $generatedTurn->client_id   = $client_id;
        $generatedTurn->ticket_id   = $ticket_id;
        $generatedTurn->turn_type   = $turn_type;

        $generatedTurn->save();

        $query = $generatedTurn->orderBy('id','desc')->first();
        
        $html = view('ticket.ticket',['turn'=> $query]);
        
        $pdf = new Mpdf(['mode' => 'utf-8', 'format' => [190, 200]]);
        $pdf->WriteHTML($html);
        $pdf->Output();

        return redirect()->route('index')->with(['message'=>'¡Gracias por preferirnos!, Ahora espere su turno']);

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
    
}
