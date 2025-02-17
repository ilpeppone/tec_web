<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'Torbit'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Stili custom -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
     <!-- Bootstrap JS and dependencies -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    @yield('head')
</head>

<body class="bg-dark text-white">
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg py-2 fixed-top">
            <div class="container">
                
                <!-- Toggle per dispositivi mobili -->
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Logo -->
                <a href="{{ url('/') }}" class="navbar-brand mx-auto">
                    <img src="{{ asset('images/logoExt.png') }}" width="144" height="34" alt="Logo">
                </a>

                <!-- Menu di navigazione per dispositivi grandi -->
                <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarNav">
                    <ul class="navbar-nav mx-5 my-auto">
                        <li class="nav-item mx-4">
                            <a href="{{ route('events.index') }}" class="nav-link text-center">Eventi</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('events.create') }}" class="nav-link text-center">Crea</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('help') }}" class="nav-link text-center">Help</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('about') }}" class="nav-link text-center">About</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('contact') }}" class="nav-link text-center">Contattaci</a>
                        </li>
                    </ul>
                </div>

                <!-- Auth (Login, Register o Utente) -->
                <div class="d-flex align-items-center ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="btn btn-custom-pri dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    @if(Auth::user()->role === 'admin')
                                        <i class="bi bi-shield-check" title="Admin"></i>
                                    @endif
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('home') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('home-form').submit();">
                                            {{ __('Home') }}
                                        </a>
                                        <form id="home-form" action="{{ route('home') }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if(Auth::user()->role !== 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.promote.form') }}">
                                            {{ __('Diventa Admin') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-custom-pri ms-3">Accedi</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-custom-pri ms-3">Registrati</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Off-canvas menu per dispositivi mobili -->
        <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">Eventi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.create') }}">Crea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('help') }}">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Chi Siamo?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contattaci</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Breadcrumbs: sarà visibile in ogni pagina se definito -->
        <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{ Breadcrumbs::render() }}
                </ol>
            </nav>
        </div>

        <!-- Qui verrà inserito il contenuto specifico della pagina -->
        <main style="padding-top: 110px"> <!-- Aggiungi padding-top per compensare l'altezza della navbar e dei breadcrumbs -->
            @yield('content')
        </main>
    </div>
     <!-- Footer -->
     <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Torbit. Tutti i diritti riservati.</p>
            <p>
                <a href="{{ url('/privacy') }}" class="text-white me-3">Privacy Policy</a>
                <a href="{{ url('/terms') }}" class="text-white">Termini di Utilizzo</a>
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
