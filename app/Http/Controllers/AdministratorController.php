<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;

class AdministratorController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }

   public function index(){

       return view('administrator.panel');
   }

   public function turn(){
   	
   		return view('turn.turnPanel');
   }

   public function config (){

    $user = User::all();

    return view('administrator.config', ['users'=>$user]);
}
}
