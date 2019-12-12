<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Ticket;

class TurnController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }


    public function index(){
   	
    }
    
}
