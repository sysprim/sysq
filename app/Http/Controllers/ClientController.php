<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function save(Request $request){

        $client = new Client ();
        $ci     = $request->input('ci');

        $search = $client->all()->where('ci_client', $ci);
        // var_dump($search);
        // die();
               
        if($search->count()==0){

            $validate = $this->validate($request, [ 'ci' => 'required|min:6|max:8']);

            $client = new Client ();
            $client->ci_client = $ci;
            $client->save();

            return redirect()->route('index.turn',['ci' => $ci])->with(['message'=>'Bienvenido ¡Eres nuevo entrando al sistema! - Selecciona una taquilla para continuar con el servicio.']);
                
        }else{

            return redirect()->route('index.turn',['ci' => $ci])->with(['message'=>'Bienvenido nuevamente - ¡Gracias por usar nuestros servicios!']);            
        }
    }
}
