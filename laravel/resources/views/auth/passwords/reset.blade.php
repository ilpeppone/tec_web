@extends('layouts.app')

@section('title', 'Reset Password - E-vents')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="position: relative; z-index: 1; background-color: #6d6d6d; border-radius: 10px; padding: 20px;">
                
                <h1 class="display-4 text-center">Reset Password</h1>
                <p class="lead text-center">Inserisci la nuova password</p>
                
                <div>
                    <form method="POST" action="{{ route('password.update') }}" id="reset-password-form">
                        @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Conferma Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-custom-pri">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('reset-password-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Previene l'invio del form per simulare il comportamento

        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('password-confirm').value;

        if (password === passwordConfirm && password.length >= 8) { // Controlla che le password coincidano e siano valide
            alert('La password è stata cambiata con successo! Verrai reindirizzato alla pagina di login.');
            setTimeout(() => {
                window.location.href = "{{ route('login') }}"; // Reindirizza alla pagina di login
            }, 2000);
        } else {
            alert('Le password non coincidono o non sono valide. Riprova.');
        }
    });
</script>
@endsection
