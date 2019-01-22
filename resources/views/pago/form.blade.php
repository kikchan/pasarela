<form method="POST" action="{{$url}}">
    @csrf
    {{ method_field('POST') }}
    {!! $request !!}
    <input type="submit" value="Pagar con tarjeta">
</form>