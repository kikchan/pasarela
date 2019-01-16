@extends('menuComercio')

@section('contenido')
<div class="container-contenido">
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Pedidos</a>
  <form class="form-inline"  action="{{ action('TransaccionesController@buscarId', 2) }}" method="GET">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="idTransaccion">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>


<form id="filtros" action="{{ action('TransaccionesController@filtrar', 2) }}" method="GET" width="100%" >
    <select class="selectpicker" data-style="btn-success" name="estado">
        <option value="0"> Todas los estados </option>
        @foreach(App\Estados::select(['id as c'])->groupBy(['id'])->get() as $estado)
            <option value="{{$estado->c}}"> {{$estado->c}} </option>    
        @endforeach
    </select>
    <select class="selectpicker" data-style="btn-success" name = "importe" >
        <option value="0"> Todos los importes </option>
        <option value="1"> 0€ - 50€ </option>
        <option value="2"> 50€ - 100€ </option>
        <option value="3"> 100€ - 500€ </option>
        <option value="4"> 500€ o más </option>
    </select>
    <button class="btn btn-success" type="sumbit"> Filtrar </button>
</form>
<br>

<table data-toggle="table" class="table table-striped table-bordered tablesorter">
        <thead>
          <tr>
            <td> ID </td>
            <td> Importe </td>
            <td> Estado </td>
            <td> Comentario </td>
          </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
          <tr>
              <td> {{$pago->id}} </td>
              <td> {{$pago->importe}} €</td>
              <td> {{App\Estados::where('id', $pago->idEstado)->firstOrFail()->descripcion}} </td>
              <td> {{$pago->comentario}} </td>
          </tr> 
        @endforeach
        </tbody>
    </table>
</div>
@endsection