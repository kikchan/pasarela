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
<nav class="navbar navbar-light bg-light" style="background-color: #fbfcfc;padding-right: 40px;">
  <a class="navbar-brand">Pagos</a>
  <form class="form-inline"  action="{{ action('TransaccionesController@buscarId', [$idUsuario]) }}" method="GET">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="idTransaccion" style="margin-top: 9px;float: right;">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-top: 9px;float: right;background-color: #31b0c5;color: white;">Search</button>
  </form>
</nav>


<form id="filtros" action="{{ action('TransaccionesController@filtrar', [$idUsuario]) }}" method="GET" width="100%" style="padding-left: 30px;">
    <select class="selectpicker" data-style="btn-success" name="estado">
        <option value="0"> Todas los estados </option>
        @foreach(App\Estado::select(['id as c'])->groupBy(['id'])->get() as $estado)
            <option value="{{$estado->c}}"> {{App\Estado::where('id', $estado->c)->firstOrFail()->descripcion}} </option>    
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
<div class="container" style="width: 100%;padding-left: 30px;padding-right: 40px;">
<table data-toggle="table" class="table table-striped table-bordered tablesorter" style="background-color: white;">
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
              <td> {{$pago->id}} </td>
              <td> {{$pago->importe}} €</td>
              <td> {{App\Estado::where('id', $pago->idEstado)->firstOrFail()->descripcion}} </td>
              @if($pago->idTarjeta == null)
                <td></td>
              @else
                <td> **** **** **** {{$pago->idTarjeta}} </td>
              @endif
              <td> {{$pago->comentario}} </td>
              <td><a href="{{ URL::to('/comercio/' . $idUsuario . '/pagos/' .$pago->id) }}">
                <i class="fa fa-eye"></i></a>
                <a type='button' class='btn btn-primary' href="#" > Devolver </a></td>
          </tr> 
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection