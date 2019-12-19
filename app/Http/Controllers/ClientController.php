<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function save(Request $request){

        $client = new Client ();
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

            return redirect()->route('index.turn',['ci' => $search2->id])->with(['message'=>'Bienvenido ¡Eres nuevo entrando al sistema! - Selecciona una taquilla para continuar con el servicio.']);
                
        }else{

            return redirect()->route('index.turn',['ci' => $search->id])->with(['message'=>'Bienvenido nuevamente - ¡Gracias por usar nuestros servicios!']);            
        }
    }
}
