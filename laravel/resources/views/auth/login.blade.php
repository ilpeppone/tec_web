@extends('layouts.app')

@section('title', 'Login - Torbit')

@section('content')
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-100 h-100">
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-dark text-white p-5" style="border-radius: 10px 0 0 10px;">
            <div class="w-75">
                <h3 class="text-center text-warning">Log in to <span class="fw-bold">Torbit</span></h3>
                <p class="text-center">You need to <strong>log in</strong> before continuing.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email or Username</label>
                        <input type="text" name="email" id="email" class="form-control bg-secondary text-white @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control bg-secondary text-white @error('password') is-invalid @enderror" required>
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
                                Remember Me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-warning">Forgot your password?</a>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Log In</button>
                </form>
                <div class="text-center mt-3">
                    <p>Need an account? <a href="{{ route('register') }}" class="text-warning">Register here</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-block p-0 h-100">
            <img src="{{ asset('images/ferrara.png') }}" alt="Login Image" class="img-fluid h-100 w-100" style="border-radius: 0 0px 0px 0; object-fit: cover;">
        </div>
    </div>
</div>
@endsection
