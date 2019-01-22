<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pasarela - Comercio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!------ Include the above in your HEAD tag ---------->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
        @yield('includes')
        <style>@yield('style')</style>
        <script type="text/javascript">
            parent.document.title = "Your new title";
        </script>
    </head>
    <body>  
      @yield('menu')
      @yield('contenido')
      @yield('js')
    </body>
</html>
