<?php

namespace App\Http\Controllers;
use App\User;

use Request;

class SupervisorController extends Controller
{




	
      public function supervisores(){
    	   return view('supervisores', array('usuarios' => User::all()));


    }

          public function totalUsu(){
           
           $usuarios = User::all()->count();

           return $usuarios;


    }

         public function deletar($id){
           
           $usuario = User::find($id);
           if($usuario->delete()){

            $arr = array("retorno" =>"OK");

           }else{

            $arr = array("retorno" =>"OK");
            
           }

           


    }

    		public function salvarSupervisor(){

    		$nome = Request::input('nome');	
    		$email = Request::input('email');
    		$secao_id = Request::input('secao_id');	
    		$senha = Request::input('senha');	
    		$tipo_id = Request::input('tipo_id');	

    	$user= new User();

    	$user->name = $nome;
    	$user->email = $email;
    	$user->secao_id = $secao_id;
    	$user->tipo_id = $tipo_id;
    	$user->password =   bcrypt($senha);

    	if($user->save()){
    		
    		 return redirect()->action('SupervisorController@supervisores');

    	}
    }
    


}
