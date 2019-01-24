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
      <table data-toggle="table" class="table table-bordered tablesorter" style="background-color: white;">
        <tr>
          <td>Comercio</td><td>{{$usuario->nick}}</td>
        </tr>
        <tr>
          <td>Nombre</td><td>{{$usuario->nombre}}</td>
        </tr>
        <tr>
          <td>Apellidos</td><td>{{$usuario->apellidos}}</td>
        </tr>
        <tr>
          <td>Correo electrónico</td><td>{{$usuario->email}}</td>
        </tr>
        <tr>
          <td>Tipo de usuario</td><td>mocked</td>
        </tr>
      <table>
    </div>
  </div>
@endsection