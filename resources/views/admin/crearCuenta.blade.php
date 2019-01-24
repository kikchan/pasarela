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
      <a class="navbar-brand" style="padding-top: 0px;color: white">Crear cuenta</a>
    </nav>

    <div class="container" style="margin-top: 2em">
      <!-- Mostrar notificación si acabamos de actualizar el usuario -->
      @if (isset($usuarioCreado))
          <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Usuario creado correctamente.
          </div>
      @endif

      <form method="POST" action="/administrador/crearCuentaUsuario">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <label>Nick: </label>
      <input required type="text" name="nick">
      <label>Contraseña: </label>
      <input required type="password" name="password">
      <label>Nombre: </label>
      <input required type="text" name="nombre">
      <label>Apellidos: </label>
      <input required type="text" name="apellidos">
      <label>Email: </label>
      <input required type="email" name="email">
      <label>Clave: </label>
      <input required type="text" name="key">
      <label>Endpoint: </label>
      <input required type="text" name="endpoint">
      
      <label>Tipo: </label>
      <select name="tipo">
        <option selected value="comercio">Comercio</option>
        <option value="tecnico">Técnico</option>
        <option value="administrador">Administrador</option>
      </select>

      <input class="btn btn-dark" type="submit" value="Enviar">
    </form>
  </div>
@endsection