@extends('menuComercio')

@section('contenido')
<div class="container-contenido">
<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">General</span>
</nav>

<h1>Ejemplos de gr&#225;ficos usando Chart.js</h1><br>

<script src="{{ URL::asset('js/Chart.js') }}"></script>
<div id="canvas-holder" style="margin-left: 20px;">
    <canvas id="chart-area4" width="600" height="200"></canvas>
</div>

<script>
    var option = {
    yAxes: [{
        ticks: {
            min: 0,
            max: 100,
            stepSize: 20
        }
    }]
}

    var lineChartData = {
        labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
        datasets : [
            {
                label: "Primera serie de datos",
                fillColor : "rgba(220,220,220,0.2)",
                strokeColor : "#6b9dfa",
                pointColor : "#1e45d7",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(220,220,220,1)",
                data : [50,30,10,40,15,5,15,0,0,0,0,0],
                options: option
            }
        ]
    }
    var ctx4 = document.getElementById("chart-area4").getContext("2d");
    window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
</script>
</div>
@endsection