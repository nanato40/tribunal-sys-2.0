<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{


  protected $primaryKey = 'id_contrato';

	public function modelo(){
        return $this->belongsTo('App\Modelo','modelo_id');
    }

    public function nomeSecao(){
        return $this->belongsTo('App\Secao','secao_id');
    }

    public function usuario(){
        return $this->belongsTo('App\User','usuario_id');
    }

    public function nomePdf(){
        return $this->belongsTo('App\Pdf','pdf_id');
    }
    
}
