@extends('adminlte::page')

@section('title', 'Seções')

@section('content_header')
    <h1>Meu Perfil</h1>
@stop

@section('content')

<form method="POST" action="{{ action ('UsuarioController@updateUser')}}">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
 <div class="form-group">
    <label for="pwd">Nome:</label>
    <input type="text" class="form-control" name="nome" id="pwd" value="{{ Auth::user()->name }}">
  </div>

  <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="text" class="form-control" name="email" id="pwd" value="{{ Auth::user()->email }}">
  </div>

  <button type="submit" class="btn btn-default">Atualizar</button>

  </form>

@stop