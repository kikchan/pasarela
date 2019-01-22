@extends('principal')

@section('includes')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">                
  <link href="{{ asset('css/comercio.css') }}" rel="stylesheet">

  <script type="text/javascript">
    document.getElementById('li-dashboard').classList.add("collapsed active")
  </script>
@endsection

@section('menu')
  @include('admin/menu')
@endsection

@section('contenido')
  <div class="container-contenido">
    <strong>Dashboard</strong>
    <p>Vero, mete el código aquí</p>
  </div>
@endsection