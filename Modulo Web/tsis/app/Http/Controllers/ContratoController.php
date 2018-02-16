<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use Validator;

use App\Contrato;

class ContratoController extends Controller
{
    public function contratos(){


        return view('requisicoes', array('contratos' => Contrato::all()));
    }

    public function contratosMobile(Request $request){

        $con = Contrato::all()->where('usuario_id',$request->id);

        if($con->count() == 0){
            return $con = array("retorno" =>"NO");
        }else{
            foreach ($con as $row){
                $row->status;
                $row->created_at;
                $row->modelo->modelo;
                $row->nomePdf->nomePdf;
                $row->id_contrato;


            }



            return $con;
        }

    }


    public function excluir(Request $request){

        $cont = Contrato::find($request->id);

        if($cont->delete()){

            return $arr = array("retorno" => "OK");

        }else{

           return $arr = array("retorno" => "NO");

        }
    }



    public function update(Request $request){

        $cont = Contrato::find($request->id);
        $cont->status = $request->status;
        if($cont->save()){

            return  $arr = array("retorno" => "OK");

        }else{

            return  $arr = array("retorno" => "NO");

        }
    }

    public function search(Request $req){

        $cont = Contrato::all()->whereIn('status',[$req->search]);



        if($cont->count() == 0){
            return $arr = array("retorno"=>"NO");
        }else{

            foreach ($cont as $con){
                $con->usuario->name;
                $con->modelo->modelo;
                $con->created_at;
                $con->nomeSecao->nomeSecao;
                $con->nomePdf->nomePdf;
                $con->status;
            }

            return $cont;


        }


    }


    public function totalCon(){

        $con  = Contrato::where("status","Aguardando")->count();
        return $con;
    }


}
