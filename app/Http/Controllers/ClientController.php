<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function save(Request $request){

        $validate = $this->validate($request, [ 'ci' => 'required']);

        $ci = $request->input('ci');

        $cliente = new Client ();
        $cliente->ci_client = $ci;
        $cliente->save();

        return view('ticket.ticketIndex', ['ci'=>$ci]);
    }
}