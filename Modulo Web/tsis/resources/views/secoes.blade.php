@extends('adminlte::page')

@section('title', 'Seções')

@section('content_header')
    <h1>Seções</h1>
@stop

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">


  
function deletar(id){


   var jqxhr = $.ajax( "/admin/secoes/"+id )
  .done(function(data) {
    
    if(data.retorno == "OK"){
       $( "#secaoAtual" ).slideUp( "slow", function() {});
    }else{
        alert("ERROR");
    }


  });
 
  
}
</script>


@section('content')
  <div class="card">
  <div class="card-block">
    

<form method="POST" action="{{ action('SecaoController@salvarSecao') }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome da Seção</label>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type="text" class="form-control" name="secao" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da Seção">
   
  </div>
 
  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>


  </div>



</div>



<br>



<table class="table" align="center">
  <thead>
    <tr>
      <th scope="col">Nome da Seção</th>
      <th scope="col" align="center">Ações</th>
    </tr>
  </thead>
  <tbody>

@forelse ($secao as $value)
    <tr id="secaoAtual">
    
      <td >{{ $value->nomeSecao }}</td>

     
    
      <td><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info">Alterar</button> <a href=""><button type="button" onclick="deletar({{$value->id_secao}})" class="btn btn-info">Excluir</button></a></td>
    
    @empty
    <p>Sem seções</p>
  
    
    </tr>

     
  

    @endforelse
  </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar seção.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
   <label for="exampleInputEmail1">Nome da Seção</label>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type="text" class="form-control" name="secao" id="secao" aria-describedby="emailHelp" placeholder="Nome da Seção">
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" onclick="enviar()" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>


   




@stop

