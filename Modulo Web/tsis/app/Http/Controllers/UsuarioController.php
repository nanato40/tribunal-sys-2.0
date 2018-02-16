<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;


class UsuarioController extends Controller
{
    public function settings (){


    	return view('perfil');

    }

    

public function logarMobile(Request $request){



    $user = User::all()->where('email', $request->email)->where('password', $request->senha)->first();
    //$user->where('email', "36378643")->where('email', "nanato40@hotmail.com");

    if(is_null($user)){
        return $arr = array("retorno" => "FALSE");
    }else{
        return $arr = array("id"=> $user->id,"nome"=> $user->name, "email"=> $user->email, "senha"=> $user->password, "secao" => $user->nomeSecao->nomeSecao);
    }

    

}

    public function updateUser(){

    		$nome = Request::input('nome');
    		$email = Request::input('email');
    		$user = User::find(Auth::id());
    		$user->name = $nome;
    		$user->email = $email;

    		if($user->save()){
    			return redirect()->action('UsuarioController@settings');
    		}
    		

    }
}
