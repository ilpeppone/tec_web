@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="">{{ __('Verifica il tuo indirizzo email') }}</div>

                <div class="">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                        </div>
                    @endif

                    {{ __('Prima di continuare, controlla la tua email per un link di verifica.') }}
                    {{ __('Se non hai ricevuto l\'email, puoi richiedere un nuovo link qui sotto.') }}

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('Reinvia email di verifica') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
