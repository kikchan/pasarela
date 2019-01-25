@extends('principal')

@section('includes')     
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet">       
@endsection

@section('menu')
  @include('comercio/menuComercio', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
<div class="container-contenido">
    <div class="container" style="margin-top:25px">
        <table class="table">
            <thead>
                <tr>
                    <th >Transaccion</th>
                    <th></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <th>Identificaddor: </th>
                    <td>{{$transaccion->id}}</td>
                </tr>
                <tr>
                    <th>Importe: </th>
                    <td>{{$transaccion->importe}}</td>
                </tr>
                <tr>
                    <th>Estado: </th>
                    <td> {{App\Estado::where('id', $transaccion->idEstado)->firstOrFail()->descripcion}} </td>
                </tr>
                <tr>
                    <th>Comentario: </th>
                    <td>{{$transaccion->comentario}}</td>
                </tr>
                <tr>
                    <th>Fecha de creación: </th>
                    <td>{{$transaccion->created_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection