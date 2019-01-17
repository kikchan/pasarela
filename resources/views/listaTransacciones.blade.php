@extends('menuComercio')

@section('contenido')
<div class="container-contenido">
<h2 style="margin:3%;"><font color = '#084B8A'> PEDIDOS </font></h2>

<form id="filtros" action="{{ action('TransaccionesController@filtrarEstado') }}" method="GET" width="100%" >
    <select style="color:white; background-color:#084B8A;" name="estado">
        <option value="0"> Todas los estados </option>
        @foreach(App\Estados::select(['id as c'])->groupBy(['id'])->get() as $estado)
            <option value="{{$estado->c}}"> {{$estado->c}} </option>    
        @endforeach
    </select>
    <select style="color:white; background-color:#084B8A;" name = "importe" >
        <option value="0"> Todos los importes </option>
        <option value="1"> 0€ - 50€ </option>
        <option value="2"> 50€ - 100€ </option>
        <option value="3"> 100€ - 500€ </option>
        <option value="4"> 500€ o más </option>
    </select>
    <button style="color:white; background-color:#084B8A;"  type="sumbit"> Filtrar </button>
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