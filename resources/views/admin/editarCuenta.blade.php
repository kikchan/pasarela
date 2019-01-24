@extends('principal')

@section('includes')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">                
  <link href="{{ asset('css/comercio.css') }}" rel="stylesheet">
@endsection

@section('menu')
  @include('admin/menu')
@endsection

@section('contenido')
  <div class="container-contenido">
    <nav class="navbar" style="background-color: #2e353d;height: 50px">
      <a class="navbar-brand" style="padding-top: 0px;color: white">Editar cuenta</a>
    </nav>

    <div class="container" style="margin-top: 2em">
      <!-- Mostrar notificación si acabamos de actualizar el usuario -->
      @if (isset($usuarioEditado))
          <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Usuario editado correctamente.
          </div>
      @endif

      <form method="POST" action="{{ route('editarCuentaUsuario', $usuario->id) }}">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <label>Nick: </label>
      <input required type="text" name="nick" value="{{$usuario->nick}}">
      <label>Nombre: </label>
      <input required type="text" name="nombre" value="{{$usuario->nombre}}">
      <label>Apellidos: </label>
      <input required type="text" name="apellidos" value="{{$usuario->apellidos}}">
      <label>Email: </label>
      <input required type="email" name="email" value="{{$usuario->email}}">
      <label>Clave: </label>
      <input required type="text" name="key" value="{{$usuario->key}}">
      <label>Endpoint: </label>
      <input required type="text" name="endpoint" value="{{$usuario->endpoint}}">
      
      <label>Tipo: </label>
      <select name="tipo">
        @if($usuario->esAdministrador)
          <option selected value="administrador">Administrador</option>
          <option value="tecnico">Técnico</option>
          <option value="comercio">Comercio</option>
        @elseif($usuario->esTecnico)
          <option selected value="tecnico">Técnico</option>
          <option value="administrador">Administrador</option>
          <option value="comercio">Comercio</option>
        @else         
          <option selected value="comercio">Comercio</option>
          <option value="tecnico">Técnico</option>
          <option value="administrador">Administrador</option>
        @endif
      </select>

      <input class="btn btn-dark" type="submit" value="Enviar">
    </form>
  </div>
@endsection