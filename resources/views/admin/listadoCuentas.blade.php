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
      <a class="navbar-brand" style="padding-top: 0px;color: white">Listado cuentas</a>
    </nav>

    <div class="container" style="margin-top: 2em">
      <table data-toggle="table" class="table table-bordered tablesorter" style="background-color: white;">
        <thead>
          <tr>
            <th>ID</th>
            <th>Comercio</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo electrónico</th>
            <th>Tipo de usuario</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($usuarios as $usuario)
            <tr>
              <td>{{$usuario->id}}</td>
              <td>{{$usuario->nick}}</td>
              <td>{{$usuario->nombre}}</td>
              <td>{{$usuario->apellidos}}</td>
              <td>{{$usuario->email}}</td>
              <td>
                @if($usuario->esComercio)
                  <comercio>comercio</comercio>
                @elseif($usuario->esAdministrador)
                  <admin>administrador</admin>
                @elseif($usuario->esTecnico)
                  <tecnico>técnico</tecnico>
                @else
                  no determinado
                @endif
              </td>
              <td>
                <a class="btn-sm btn-warning" href="/administrador/editarCuenta/{{$usuario->id}}">Editar</a>
                <a class="btn-sm btn-danger" href="/administrador/borrarCuenta/{{$usuario->id}}">Borrar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      <table>
    </div>
  </div>
@endsection