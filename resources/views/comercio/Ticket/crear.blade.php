@extends('menuComercio')

@section('contenido')
<div class="container-contenido">
<h2> Crear ticket </h2>
  <form method="POST" action="{{ route('crearTicket') }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <input class="form-control" required type="text" name="asunto" placeholder="Asunto...">

    <!-- Relación con Transacción (opcional) -->
    <div class="select-input">
        <div class="form-group">
            <label for="sel1" style="display: block;">Transacci&oacute;n (seleccione una):</label>
            <select name="transaccion" class="form-control" style="display: inline; width: 30%; vertical-align: middle;">
                <option hidden selected value=""> Selecciona una opci&oacute;n </option>
                <option value=""> Ninguna </option>
                @foreach ($transacciones as $t)
                <option value="{{$t->id}}">{{$t->comentario}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <textarea class="form-control" required rows="3" name="mensaje" placeholder="Escribe la incidencia..."></textarea>
    <input class="btn btn-dark" type="submit" value="Enviar">
  </form>
</div>
@endsection