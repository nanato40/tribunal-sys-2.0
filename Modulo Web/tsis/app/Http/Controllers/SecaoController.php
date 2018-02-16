<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use Validator;

use App\Secao;





class SecaoController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function secoes(){

    	return redirect()->action('SecaoController@listarSec');
    }

 public function salvarSecao(){

    	$sec = Request::input('secao');	

    	$secao = new Secao();

    	$secao->nomeSecao = $sec;
    	if($secao->save()){
    		return redirect()->action('SecaoController@listarSec');
    	}

    }

    public function listarSec(){

    	$sec =  Secao::all();

    	return view('secoes')->with('secao', $sec);
    }

    public function secaoMobile(){

        $sec =  Secao::all();

        return $sec;
    }


    public function excluir($id){

        $sec =  Secao::find($id);

        if($sec->delete()){

            return $arr = array("retorno"=>"OK");

        }else{

            return $arr = array("retorno"=>"NO");
        }

      
    }



 public function update($id, Request $request){

        $sec =  Secao::find($id);
        $sec->nomeSecao = $request->secao;
        if($sec->save()){
            return $arr = array("retorno" => "OK");

        }else{
            return $arr = array("retorno" => "NO");
        }

    }


    public function totalSec(){

        $sec =  Secao::all()->count();
    

       return  $sec;
    }



}
