<form method="POST" action="{{$url}}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <input type="hidden" name="prueba" value="{{$request}}">
    <input type="submit" value="Enviar">
</form>