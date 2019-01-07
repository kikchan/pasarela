<form method="POST" action="">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <input type="hidden" name="prueba" value="{{$input}}">
    <input type="submit" value="Enviar">
</form>