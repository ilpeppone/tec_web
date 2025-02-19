@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container text-center py-5 text-center col-md-6 mx-auto" style="position: relative; z-index: 1; color: white; background-color: #6d6d6d; border-radius: 10px; padding: 20px;">
                <h1 class="mb-4">{{ __('Verifica il tuo indirizzo email') }}</h1>

                <p>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                        </div>
                    @endif

                    {{ __('Prima di continuare, controlla la tua email per un link di verifica.') }}
                    {{ __('Se non hai ricevuto l\'email, puoi richiedere un nuovo link qui sotto.') }}

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-custom-pri">{{ __('Reinvia email di verifica') }}</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
