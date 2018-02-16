@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Novos Usuários</h1>
@stop

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">

  
function deletar(id){


   var jqxhr = $.ajax( "/admin/usuario/deletar/"+id )
  .done(function() {
   if(data.retorno == "OK"){
       $( "#usuarioAtual" ).slideUp( "slow", function() {});
    }else{
        alert("ERROR");
    }
  })
  .fail(function() {
    alert( "error" );
  })
  
}
</script>

@section('content')



  <div class="card">
  <div class="card-block">
    

<form method="POST" action="{{ action('SupervisorController@salvarSupervisor') }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type="text" class="form-control" name="nome" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome do Supervisor">
   
  

  <label for="exampleInputEmail1">E-mail</label>
   
    <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">



<label for="exampleInputEmail1">Seção</label>


<select id="categoria_id" name="secao_id" class="form-control">
   
 
    @foreach (App\Secao::all() as $categoria)
        <option value="{{ $categoria->id_secao }}">{{ $categoria->nomeSecao }}</option>
    @endforeach
 
</select>

<label for="exampleInputEmail1">Tipo</label>


<select id="categoria_id" name="tipo_id" class="form-control">
  
 
    @foreach (App\Tipo::all() as $tipo)
        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
    @endforeach
 
</select>


<label for="exampleInputEmail1">Senha</label>
   
    <input type="text" class="form-control" name="senha" id="exampleInputEmail1"  aria-describedby="emailHelp" >
   
  </div>
</div>


 
 
  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>


  </div>

  <br>

  <table class="table" align="center">
  <thead>
    <tr>
      <th scope="col">Nome</th>
       <th scope="col">Email</th>
      
        <th scope="col">Tipo</th>
      <th scope="col" align="center">Ações</th>
    </tr>
  </thead>
  <tbody>

@forelse ($usuarios as $value)
    <tr id="usuarioAtual">
    
      <td>{{ $value->name }}</td>
      <td>{{ $value->email }}</td>

      <td>{{ $value->tipo->tipo }}</td>
     

     
    
      <td><a href=""><button type="button" onclick="deletar({{$value->id}})"class="btn btn-info">Excluir</button></a></td>
    
    @empty
    <p>Sem seções</p>
  
    
    </tr>

     
  

    @endforelse
  </tbody>
</table>




</div>



<br>




@stop