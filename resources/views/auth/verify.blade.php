@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Te acabamos de enviar un correo electrónico al email indicado. Por favor, sigue los pasos del email.') }}
                        </div>
                    @endif

                    {{ __('Comprueba tu bandeja de entrada y spam del correo electrónico antes de seguir.') }}
                    {{ __('Si no has recibido un correo,') }}, <a href="{{ route('verification.resend') }}">{{ __('haz click aquí para reenviarte otro.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
