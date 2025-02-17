@extends('layouts.app')

@section('title', 'Register - Torbit')

@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center align-items-start p-0">
    <div class="row w-100 h-100 m-0">
        <div class="col-md-6 d-none d-md-block p-0 h-100">
            <img src="{{ asset('images/log_background.jpeg') }}" alt="Register Image" class="img-fluid h-100 w-100" style="border-radius: 0 0px 0px 0; object-fit: cover; filter:blur(50px);">
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-dark text-white p-5" style="border-radius: 0 10px 10px 0;">
            <div class="w-75">
                <h3 class="text-center text-warning">Registrati a <span class="fw-bold">Torbit</span></h3>
                <p class="text-center">Crea un nuovo account per usufruire di tutte le funzionalità</p>
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Account</label>
                        <input type="text" name="name" id="name" class="form-control bg-secondary text-white @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Mario Rossi" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control bg-secondary text-white @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="mario.rossi@example.com" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control bg-secondary text-white @error('password') is-invalid @enderror" placeholder="********" required onload="hidePasswordHelp()" onfocus="showPasswordHelp()" onblur="hidePasswordHelp()">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small id="passwordHelp" class="form-text password-help">La password deve contenere almeno 8 caratteri, una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale.</small>
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Ripeti Password</label>
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control bg-secondary text-white" placeholder="********" required>
                    </div>
                    <div class="mb-3">
                        <p class="text-center">
                            Si prega di consultare i nostri <a href="{{ url('/terms') }}" class="text-warning">Termini di Servizio</a> e la <a href="{{ url('/privacy') }}" class="text-warning">Privacy Policy</a>.
                        </p>
                    </div>
                    <button type="submit" class="btn btn-custom-pri w-100">Registrati</button>
                </form>
                <div class="text-center mt-3">
                    <p>Sei già registrato? <a href="{{ route('login') }}" class="text-warning">Accedi qui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showPasswordHelp() {
        document.getElementById('passwordHelp').style.display = 'block';
    }

    function hidePasswordHelp() {
        document.getElementById('passwordHelp').style.display = 'none';
    }
</script>
@endsection
