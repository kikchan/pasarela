@extends('principal')

@section('includes')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">                
  <link href="{{ asset('css/comercio.css') }}" rel="stylesheet">
  <link href="{{ asset('css/ticket.css') }}" rel="stylesheet">
@endsection

@section('menu')
  @include('comercio/menuComercio')
@endsection

@section('contenido')
<div class="container-contenido">
  <nav class="navbar" style="background-color: #2e353d;height: 50px">
      <a class="navbar-brand" style="padding-top: 0px;color: white">Crear ticket</a>
    </nav>
  <form class="crearTicket" method="POST" action="{{ route('crearTicket') }}" style="width: 95%; margin-left: 25px;">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <input class="form-control" required type="text" name="asunto" placeholder="Asunto..." style="margin-bottom: 25px; margin-top: 25px; width: 350px; display: inline">

    <!-- Relación con Transacción (opcional) -->
    <div class="select-input">
        <div class="form-group">
            <label for="sel1" style="display: block;">Transacci&oacute;n (seleccione una):</label>
            <select name="transaccion" class="form-control" style="display: inline; width: 25%; vertical-align: middle;">
                <option hidden selected value=""> Selecciona una opci&oacute;n </option>
                <option value=""> Ninguna </option>
                @foreach ($transacciones as $t)
                <option value="{{$t->id}}">{{$t->comentario}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <textarea class="form-control" required rows="3" name="mensaje" placeholder="Escribe la incidencia..."></textarea>
    <input class="btn btn-dark" type="submit" value="Enviar" style="margin-top: 10px;">
  </form>
</div>
@endsection