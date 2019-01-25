@extends('principal')

@section('includes')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">         
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet">       
@endsection

@section('menu')
  @include('comercio/menuComercio', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
<div class="container-contenido" >
    <nav class="navbar" style="background-color: #2e353d;height: 50px">
      <a class="navbar-brand" style="padding-top: 0px;color: white">Wiki</a>
    </nav>
    <div class="container">
        <p style="margin-bottom:10px"><strong>PA$AR€LA</strong> es un TPVV seguro y muy facil de utilizar. Para incorporarlo <br> en tu pagina web solo tienes que seguir unos sencillos pasos.</p>
        <div class="row" style=" border-style:solid;border-width:thick;padding-top:5px">
            <div class="col-2 offset-3">
                <img src="{{asset('images/f1.png')}}">
            </div>
            <div class="col-3 offset-1">
                <p><strong>Descarga los ficheros necesarios</strong></p>
                <p>Guárdalos donde desees y utilízalos para generar peticiones</p>
            </div>
        </div>
        <br>
        <div class="row" style=" border-style:solid;border-width:thick;padding-top:5px">
            <div class="col-2 offset-2">
                <p><strong>Observa la simulacián de tarjetas</strong></p>
                <p>Cada tarjeta puede devolver un error único</p>
            </div>
            <div class="col-2 offset">
                <img src="{{asset('images/f2.png')}}">
            </div>
        </div>
        <br>
        <div class="row" style=" border-style:solid;border-width:thick;padding-top:5px">
            <div class="col-2 offset-1">
                <img src="{{asset('images/f3.png')}}">
            </div>
            <div class="col-3 offset-4">
                <p><strong>Realiza pagos y gestiona tu negocio</strong></p>
                <p>Compatible con multitud de tarjetas sin importar el país o la divisa.</p>
            </div>
        </div>
        <p><strong>Encontrarás todos los pasos y mas información en la <a href="http://185.207.145.237/files/Tutorial.pdf">GUIA</a></strong></p>
    </div>
</div>
@endsection