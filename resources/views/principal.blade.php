<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pasarela - Comercio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <link rel="stylesheet" href="css/comercio.css">
        <link href = {{ asset("/css/app.css") }} rel="stylesheet" />
        <script src = {{ asset("/js/app.js") }} ></script>
        <link href = {{ asset("/css/font-awesome.min.css") }} rel="stylesheet" />
        <style>@yield('style')</style>
    </head>
    <body>  
      @yield('menu')
      @yield('js')
    </body>
</html>