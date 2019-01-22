@extends('principal')

@section('includes')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">         
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet">       
@endsection

@section('menu')
  @include('comercio/menuComercio', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
<!-- Chart.js -->
<script src="{{ URL::asset('js/Chart.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

<div class="container-contenido" >
    <nav class="navbar navbar-light bg-light" style="background-color:  #fbfcfc;">
    <p style="font-size: 18px;padding: 10px;padding-bottom: 0px;">Vista general</p>
    </nav>

    <div class="container">
      @foreach($numPagos as $p)
        <input type="hidden" name="numPagos[]" class="input_next autoNumeric" value="{{$p}}">
      @endforeach
    </div>

    <div class="container" style="width: 100%;padding-left: 30px;">
      <div class="cuadrado" style="background: #ebc12e; float: left;">
        <p>Transacciones</p>
        <p style="text-align: right;font-size: 24px;">{{$pagos}}</p>
      </div>
      <div class="cuadrado" style="background: #3ad2ab ; float: left;">
        <p style="margin-bottom: 0px;font-size: 14px;">Transacciones rechazadas</p>
        <p style="text-align: right;font-size: 24px;">{{$tickets[3]}}</p>
      </div>
      <div class="cuadrado" style="background: #3dcb80 ; float: left;">
        <p>Ingresos</p>
        <p style="text-align: right;font-size: 24px;">{{$ingresos}} €</p>
      </div>
      <div class="cuadrado" style="background: #a641d2; float: left;">
        <p>Tickets</p>
        <p style="text-align: right;font-size: 24px;">{{$totalTickets}}</p>
      </div>
    </div>

    <canvas id="grafico" height="300" width="900" style="margin-left: 60px;background-color: white;"></canvas>

    <div class="container" style="width: 100%;padding-left: 45px;">
    <h2></h2>
      <table class='table table-striped table-bordered tablesorter' style="width: 45%;float: left;margin-right: 50px; background-color: white;">
        <thead>
          <tr><th style="background: #67676c; color: white;">Número de pagos realizados en el mes anterior: {{$totalTrans}}</th></tr>
        </thead>
        <tbody>
          <tr><td>Pagos generados: {{$transacciones[0]}}</td></tr>
          <tr><td>Pagos en espera: {{$transacciones[1]}}</td></tr>
          <tr><td>Pagos aceptado: {{$transacciones[2]}}</td></tr>
          <tr><td>Pagos rechazados: {{$transacciones[3]}}</td></tr>
        </tbody>
      </table>

      <table class='table table-striped table-bordered tablesorter' style="width: 45%;">
        <head>
          <tr><th style="background: #67676c; color: white;">Número de tickets (incidencias): {{$totalTickets}}</th></tr>
        </head>
        <body>
          <tr><td>Tickets generados: {{$tickets[0]}}</td></tr>
          <tr><td>Tickets en espera: {{$tickets[1]}}</td></tr>
          <tr><td>Tickets aceptado: {{$tickets[2]}}</td></tr>
          <tr><td>Tickets rechazados: {{$tickets[3]}}</td></tr>
        </body>
      </table>
    </div>
</div>


<script>
  months = [
    "Enero", "Febrero", "Marzo","Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre","Octubre", "Noviembre", "Diciembre"
  ];
  var date = new Date();
  date.setMonth(date.getMonth() - 1);
  var month = months[date.getMonth()];
  
  var datosDinamo = new Array();
  var labelsDinamo = new Array();
  $("input[name='numPagos[]']").each(function(indice, elemento) {
    datosDinamo[indice] = $(elemento).val();
    labelsDinamo[indice] = (indice+1)+ ' '+month;
  });

  var grafico = $('#grafico')
  var BarraCri = new Chart(grafico, {
    type: 'line',
    data: {
      datasets: [{ label: 'Número de transacciones', data: datosDinamo, backgroundColor: "#6b9dfa", }],
      labels: labelsDinamo
    },
    options: {
      responsive: false,
      title: {  display: true, text: 'Análisis de las tranacciones realizadas', fontSize: 28 },
      scales: {
        yAxes: [{ display: true, ticks: { beginAtZero: true, suggestedMax: 5 } }],
        xAxes: [{ display: true, ticks: { autoSkip: true } }]
      }
    }
  });
</script>
@endsection