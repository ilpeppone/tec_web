@extends('layouts.main')

{{-- Imposta il titolo della pagina --}}
@section('title', 'Torbit')

{{-- Sezione per eventuali script o stili specifici della pagina --}}
@section('head')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

{{-- Contenuto principale della pagina --}}
@section('content')
    <header class="py-4">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Benvenuto sul nostro sito</h1>
            </div>
            <div class="col text-end">
                @if (Route::has('login'))
                    <nav>
                        @auth
                            <a href="{{ route('home') }}" class="btn btn-outline-light">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light me-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </header>
@endsection
