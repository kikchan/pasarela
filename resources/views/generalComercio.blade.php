@extends('menuComercio')

@section('contenido')
<!-- Chart.js -->
<script src="{{ URL::asset('js/Chart.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

<div class="container-contenido" >
    <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h3">Vista General</span>
    </nav>

    <div class="container">
      @foreach($numPagos as $p)
        <input type="hidden" name="numPagos[]" class="input_next autoNumeric" value="{{$p}}">
      @endforeach
    </div>

    <canvas id="grafico" height="300" width="900" style="margin-left: 30px;"></canvas>

    <div class="container" style="width: 100%;">
    <h2></h2>
      <table class='table table-striped table-bordered tablesorter' style="width: 45%;float: left;margin-right: 50px;">
        <head>
          <tr><th>Número de peagos realizados en el mes anterior: {{$totalTrans}}</th></tr>
        </head>
        <body>
          <tr><td>Pagos generados: {{$transacciones[0]}}</td></tr>
          <tr><td>Pagos en espera: {{$transacciones[1]}}</td></tr>
          <tr><td>Pagos aceptado: {{$transacciones[2]}}</td></tr>
          <tr><td>Pagos rechazados: {{$transacciones[3]}}</td></tr>
        </body>
      </table>

      <table class='table table-striped table-bordered tablesorter' style="width: 45%;">
        <head>
          <tr><th>Número de tickets(incidencias): {{$totalTickets}}</th></tr>
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
  var datosDinamo = new Array();
  $("input[name='numPagos[]']").each(function(indice, elemento) {
    datosDinamo[indice] = $(elemento).val();
  });
  var labelsDinamo = [ "1 Enero", "2 Enero", "3 Enero", "4 Enero", "5 Enero", "6 Enero", "7 Enero", "8 Enero", "9 Enero", "10 Enero", "11 Enero", 
  "12 Enero", "13 Enero", "14 Enero", "15 Enero", "16 Enero", "17 Enero", "18 Enero", "19 Enero", "20 Enero", "21 Enero", "22 Enero", "23 Enero",
  "24 Enero", "25 Enero", "26 Enero", "27 Enero","28 Enero","29 Enero","30 Enero","31 Enero"];

  var grafico = $('#grafico')
  var BarraCri = new Chart(grafico, {
    type: 'line',
    data: {
      datasets: [{
        label: 'Pagos realizados',
        data: datosDinamo,
        backgroundColor: "#6b9dfa",
      }],
      labels: labelsDinamo
    },
    options: {
      responsive: false,
      title: {
        display: true,
        text: 'Análisis de las tranacciones realizadas',
        fontSize: 30
      },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
            suggestedMax: 5
          }
        }],
        xAxes: [{
          display: true,
          ticks: {
            autoSkip: true
          }
        }]
      }
    }
  });
</script>
@endsection