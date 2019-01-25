@extends('principal')

@section('includes')
<script src = {{ asset("/js/card.js") }} ></script>
<link href = {{ asset("/css/card.css") }} rel="stylesheet" />
@endsection

@section('style')
.panel {
    height:450px;
    width:950px;
    margin:0 auto;
    margin-top: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    border-color: #ccc;
    webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel50 {
    width:474px;
    height: 224px;
    border-left: 1px solid transparent;
    border-color: #ccc;
    text-align: center;
}
.head{
    margin-top:10px;
    color: #505050;
}
.precio{
    color:red;    
}
.pagar{
    height:49px;
    width:105px;
    font-size: 1.5rem;

}
.lista{
    margin-bottom:0px;
}
.scroll{
    height: 165px;overflow-y: auto;
}
@endsection

@section('menu')


<div class="container">
    @if($registro==='error')
        <div class="alert alert-danger" style="margin-top:15px" role="alert">
            No existe el registro de pago.
        </div>
    @else
        @if($registro->idEstado!=1)
            <div class="alert alert-warning" style="margin-top:15px" role="alert">
               La transaccion ya ha finalizado previamente.
            </div>
        @else
            <form  method="POST" action="{{action('PasarelaController@check',$registro->sha)}}">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="sha" value="{{$registro->sha}}">
        
                <div class="panel row">
                    <div class="col-sm">
                        <h5 class="head">Introducir tarjeta de credito</h5>
                        <div class='card-wrapper' style="margin-top:30px"></div>
                        
                        <div class="row" style="margin-top:30px">
                            <div class="col">
                            <input type="text" class="form-control" name="number" placeholder="Numero de tarjeta" required>
                            </div>
                            <div class="col">
                            <input type="text" class="form-control" name="name" placeholder="Nombre del titular" required>
                            </div>
                        </div>
                        <div>
                            <div class="row" style="margin-top:10px">
                                <div class="col">
                                    <input type="text" class="form-control" name="expiry" placeholder="Caducidad" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="cvc" placeholder="CVV" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="row" style="border-bottom: 1px solid transparent;border-color: #ccc;overflow: hidden;">
                            <div class="col-sm panel50">
                                <h6 class="head">Lista de productos asociados</h6>
                                <div class="scroll">
                                    @foreach($lista as $item)
                                    <p class="lista">{{$item->nombre." - x".$item->cantidad}} </p>    
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm panel50">
                                <p><h6 class="head">Precio</h6></p>
                                <h2 class="precio">{{$registro->importe}}€</h2>
                                <p><input type="submit" class="btn btn-warning pagar" value="PAGAR!"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    @endif
</div>

@endsection



@section('js')
<script>
var card = new Card({
    form: 'form',
    container: '.card-wrapper',

    placeholders: {
        number: '**** **** **** ****',
        name: 'Titular',
        expiry: '**/****',
        cvc: '***'
    }
});
</script>
@endsection
