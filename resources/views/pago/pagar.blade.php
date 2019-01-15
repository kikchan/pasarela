@extends('principal')

@section('includes')
<link href = {{ asset("/css/card.css") }} rel="stylesheet" />
<script src = {{ asset("/js/card.js") }} ></script>
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
    width:95px;
    font-size: 1.5rem;

}
.lista{
    margin-bottom:0px;
}

@endsection

@section('menu')
<div class="container">
    <form>
        <div class="panel row">
            <div class="col-sm">
                <h5 class="head">Introducir tarjeta de credito</h5>
                <div class='card-wrapper' style="margin-top:30px"></div>
                
                <div class="row" style="margin-top:30px">
                    <div class="col">
                    <input type="text" class="form-control" name="number" placeholder="Numero de tarjeta">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Nombre del titular"/>
                    </div>
                </div>
                <div>
                    <div class="row" style="margin-top:10px">
                        <div class="col">
                            <input type="text" class="form-control" name="expiry" placeholder="Caducidad"/>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="cvc" placeholder="CVV"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="row" style="border-bottom: 1px solid transparent;border-color: #ccc;">
                    <div class="col-sm panel50">
                        <h6 class="head">Lista de productos asociados</h6>
                        <div>
                            <p class="lista">item1 x1</p>
                            <p class="lista">item2 x2</p>
                            <p class="lista">item3 x1</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm panel50">
                        <p><h6 class="head">Precio</h6></p>
                        <strike>50€</strike><br>
                        <h2 class="precio">20€</h2>
                        <p><button type="button" class="btn btn-warning pagar"><strong>Pagar!</strong></button></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
