<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{

    	public function save(Request $request){

    		$validate = $this->validate($request, ['ci'=>'required']);

    		$request->input('ci');
    }
}
