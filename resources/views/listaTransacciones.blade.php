@extends('principal')

@section('includes')     
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet"> 



<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">       
@endsection

@section('menu')
  @include('comercio/menuComercio', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
<div class="container-contenido">
<nav class="navbar" style="background-color: #2e353d;height: 50px">
  <a class="navbar-brand" style="padding-top: 0px;color: white">Pagos</a>
  <form class="form-inline" style="margin:0" action="{{ action('TransaccionesController@buscarId', [$idUsuario]) }}" method="GET">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="idTransaccion">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color: white;height:40px">Search</button>
  </form>
</nav>



<form id="filtros" action="{{ action('TransaccionesController@filtrar', [$idUsuario]) }}" method="GET" width="100%" style="padding-left: 30px;padding-top: 30px;display: inline-flex;">
    <select class="custom-select" style="width: 200px;background-color: #2ead3d;color: white;" name="estado">
        <option value="0"> Todas los estados </option>
        @foreach(App\Estado::select(['id as c'])->groupBy(['id'])->get() as $estado)
            <option value="{{$estado->c}}"> {{App\Estado::where('id', $estado->c)->firstOrFail()->descripcion}} </option>    
        @endforeach
    </select>
    <select class="custom-select" style="width: 200px;background-color: #2ead3d;color: white;" name = "importe" >
        <option value="0"> Todos los importes </option>
        <option value="1"> 0€ - 50€ </option>
        <option value="2"> 50€ - 100€ </option>
        <option value="3"> 100€ - 500€ </option>
        <option value="4"> 500€ o más </option>
    </select>
    <button class="btn" type="sumbit" style="height:40px"> Filtrar </button>
</form>
<br>
<div class="container" style="width: 100%;padding-left: 30px;padding-right: 40px;">
<table data-toggle="table" class="table table-bordered tablesorter" style="background-color: white;">
        <thead>
          <tr>
            <th style="background: #67676c; color: white;"> ID </th>
            <th style="background: #67676c; color: white;"> Importe </th>
            <th style="background: #67676c; color: white;"> Estado </th>
            <th style="background: #67676c; color: white;"> Tarjeta </th>
            <th style="background: #67676c; color: white;"> Comentario </th>
            <th style="background: #67676c; color: white;"> Accion </th>
          </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
          <tr>
              <td style="color: black;"> {{$pago->id}} </td>
              <td style="color: black;"> {{$pago->importe}} €</td>
              <td style="color: black;"> {{App\Estado::where('id', $pago->idEstado)->firstOrFail()->descripcion}} </td>
              @if($pago->idTarjeta == null)
                <td></td>
              @else
                <td style="color: black;"> **** **** **** {{$pago->idTarjeta}} </td>
              @endif
              <td style="color: black;"> {{$pago->comentario}} </td>
              <td style="color: black;">
                <a type='button' class='btn btn-primary' href="{{ URL::to('/comercio/' . $idUsuario . '/pagos/' .$pago->id) }}" > Detalles </a>
                @if($pago->idEstado!=5)
                  <a type='button' class='btn btn-primary' href="{{ URL::to('/comercio/' . $idUsuario . '/pagos/' .$pago->id.'/devolucion') }}" > Devolver </a>
                @endif
                </td>
          </tr> 
        @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection