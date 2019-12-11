<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index (){

        $user = User::all();

        return view('usuario.config', ['users'=>$user]);
    }

    public function update(Request $request){

        $user = User::all();
        $id   = $user->id;

        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]); 
        
        
        $name       = $request->input('name');
        $email      = $request->input('email');
        
        $user->name     = $name;
        $user->email    = $email;


        $user->update();

        return redirect()->route('config');

    }

    public function detalle($id){
        $user = User::find($id);

        return view('usuario.detalle', [
            'user'=>$user
            ]);
    }

    public function delete($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->route('config');
    }
}
