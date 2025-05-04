@extends('layouts.app')

@section('title', 'Login - E-vents')

@section('content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-start p-0">
    <div class="row w-100 h-100 m-0">
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-dark text-white p-5" style="border-radius: 10px 0 0 10px;">
            <div class="w-75">
                <h3 class="text-center mb-4">Accedi a <span class="fw-bold">E-vents</span></h3>
                <p class="text-center">Devi <strong>accedere</strong> prima di continuare.</p>
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control bg-secondary text-white @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="mario.rossi@example.com" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control bg-secondary text-white @error('password') is-invalid @enderror" placeholder="********" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Ricordami
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-warning">Password dimenticata?</a>
                    </div>
                    <button type="submit" class="btn btn-custom-pri w-100">Accedi</button>
                </form>
                <div class="text-center mt-3">
                    <p>Non hai un account? <a href="{{ route('register') }}" class="text-warning">Registrati qui</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-block p-0 h-100">
            <img src="{{ asset('images/log_background.jpeg') }}" alt="Login Image" class="img-fluid h-100 w-100" style="border-radius: 0 10px 10px 0; object-fit: cover; filter:blur(50px); opacity: 0.5; ">
        </div>
    </div>
</div>
@endsection
