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
    <nav class="navbar" style="background-color: #2e353d;height: 50px">
      <a class="navbar-brand" style="padding-top: 0px;color: white">Vista general</a>
    </nav>

    <div class="container">
      @foreach($numPagos as $p)
        <input type="hidden" name="numPagos[]" class="input_next autoNumeric" value="{{$p}}">
      @endforeach
    </div>

    <div class="container" style="width: 100%;padding-left: 30px;padding-top: 30px;">
      <div class="cuadrado" style="background: #ebc12e; float: left;">
        <p style="margin-bottom: 0px;font-size: 18px;">Transacciones</p>
        <p style="text-align: right;font-size: 26px;">{{$pagos}}</p>
      </div>
      <div class="cuadrado" style="background: #3ad2ab ; float: left;">
        <p style="margin-bottom: 0px;font-size: 14px;">Transacciones rechazadas</p>
        <p style="text-align: right;font-size: 26px;">{{$transacciones[3]}}</p>
      </div>
      <div class="cuadrado" style="background: #3dcb80 ; float: left;">
        <p style="margin-bottom: 0px;font-size: 18px;">Ingresos</p>
        <p style="text-align: right;font-size: 26px;">{{$ingresos}} €</p>
      </div>
      <div class="cuadrado" style="background: #a641d2; float: left;">
        <p style="margin-bottom: 0px;font-size: 18px;">Tickets</p>
        <p style="text-align: right;font-size: 26px;">{{$totalTickets}}</p>
      </div>
      <div class="cuadrado" style="background: #e35c70; float: left;">
        <p style="margin-bottom: 0px;font-size: 18px;">Devoluciones</p>
        <p style="text-align: right;font-size: 26px;">{{$transacciones[4]/2}}</p>
      </div>
    </div>

    <canvas id="grafico" height="300" width="900" style="width:900px;margin: 0 auto;background-color: #f9fcfc;"></canvas>

    <div class="container" style="width: 100%;padding-left: 45px;">
    <h2></h2>
      <table class="table table-bordered tablesorter" style="width: 45%;float: left;margin-right: 50px; background-color: white; color:black">
        <thead>
          <tr><th style="background: #67676c; color: white;font-size: 16px;">Número de pagos realizados en el mes anterior: {{$totalTrans}}</th></tr>
        </thead>
        <tbody>
          <tr><td style="font-size: 14px;">Pagos generados: {{$transacciones[0]}}</td></tr>
          <tr><td style="font-size: 14px;">Pagos en espera: {{$transacciones[1]}}</td></tr>
          <tr><td style="font-size: 14px;">Pagos aceptado: {{$transacciones[2]}}</td></tr>
          <tr><td style="font-size: 14px;">Pagos rechazados: {{$transacciones[3]}}</td></tr>
        </tbody>
      </table>

      <table class='table table-bordered tablesorter' style="width: 45%;background-color: white; color:black">
        <head>
          <tr><th style="background: #67676c; color: white;font-size: 16px;">Número de tickets (incidencias): {{$totalTickets}}</th></tr>
        </head>
        <body>
          <tr><td style="font-size: 14px;">Tickets generados: {{$tickets[0]}}</td></tr>
          <tr><td style="font-size: 14px;">Tickets en espera: {{$tickets[1]}}</td></tr>
          <tr><td style="font-size: 14px;">Tickets aceptado: {{$tickets[2]}}</td></tr>
          <tr><td style="font-size: 14px;">Tickets rechazados: {{$tickets[3]}}</td></tr>
        </body>
      </table>
    </div>
</div>


<script>
  months = [
    "Enero", "Febrero", "Marzo","Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre","Octubre", "Noviembre", "Diciembre"
  ];
  var date = new Date();
  date.setMonth(date.getMonth());
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
      title: {  display: true, text: 'Análisis de las transacciones realizadas', fontSize: 28 },
      scales: {
        yAxes: [{ display: true, ticks: { beginAtZero: true, suggestedMax: 5 } }],
        xAxes: [{ display: true, ticks: { autoSkip: true } }]
      }
    }
  });
</script>
@endsection