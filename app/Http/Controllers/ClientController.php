<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Turn;
use App\Ticket;

class ClientController extends Controller
{
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

    public function generatedTurn($id){

        $generatedTurn  = new Turn();
        $clientController = new ClientController();

        $queryTurn= Turn::where(['client_id'=>$id, 'turn_status'=>'En Espera'])->first();
        
        if($queryTurn == null){

            $generatedTurn->random_code = $clientController->generatedNumberTurn();
            $generatedTurn->client_id   = $id;

            $generatedTurn->save();

            $query = $generatedTurn->orderBy('id','desc')->first();

            return view('ticket.ticket',['turn'=> $query]);
        
            // $html = view('ticket.ticket',['turn'=> $query]);
        
            // $pdf = new Mpdf(['mode' => 'utf-8', 'format' => [190, 200]]);
            // $pdf->WriteHTML($html);
            // $pdf->Output();
        
        }else{
            return redirect()->route('index')->with(['message'=>'¡Ya tienes un turno en proceso!, espere su turno']);  
        }

    }

    public function save(Request $request){

        $client = new Client ();
        $clientController = new ClientController();
        $ci     = $request->input('ci');

        $search = $client->all()->where('ci_client', $ci)->first();
        // var_dump($search);
        // die();

               
        if($search==null){

            $validate = $this->validate($request, [ 'ci' => 'required|min:6|max:9']);

            $client = new Client ();
            $client->ci_client = $ci;
            $client->save();

            $search2 = $client->all()->where('ci_client', $ci)->first();
            $id = $search2->id;

           return $clientController->generatedTurn($id);
                
        }else{

            $id = $search->id;

            return $clientController->generatedTurn($id);           
        }


       
    }
}
