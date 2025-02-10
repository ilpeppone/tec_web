@extends('layouts.app')

@section('title', 'Register - Torbit')

@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center align-items-start p-0">
    <div class="row w-100 h-100 m-0">
        <div class="col-md-6 d-none d-md-block p-0 h-100">
            <img src="{{ asset('images/ferrara.png') }}" alt="Register Image" class="img-fluid h-100 w-100" style="border-radius: 0 0px 0px 0; object-fit: cover;">
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-dark text-white p-5" style="border-radius: 0 10px 10px 0;">
            <div class="w-75">
                <h3 class="text-center text-warning">Register to <span class="fw-bold">Torbit</span></h3>
                <p class="text-center">Create an account to get started.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control bg-secondary text-white @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control bg-secondary text-white @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
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
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control bg-secondary text-white" required>
                    </div>
                    <button type="submit" class="btn btn-custom-pri w-100">Register</button>
                </form>
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="{{ route('login') }}" class="text-warning">Log in here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
