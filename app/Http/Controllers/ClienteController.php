<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{

    	public function save(Request $request){

    		$validate = $this->validate($request, [ 'ci' => 'required']);
 
    		$ci = $request->input('ci');

    		$cliente = new Cliente ();
    		$cliente->ci_cliente = $ci;
    		$cliente->save();

    		return view('taquilla.indexTaquilla', ['ci'=>$ci]);
    }
}
