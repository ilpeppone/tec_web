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
    <style>
        /* Inserisci qui il tuo CSS personalizzato */
        .card-header {
            background: black;
            color: #f1f1f1;
        }

        .card-body,
        .card {
            background-color: #6c757d; /* Stesso background della navbar */
            color: black; /* Testo in nero */
        }

        .navbar {
            min-height: 50px;
        }

        .navbar-custom {
            background-color: #6c757d; /* Grigio */
        }

        .btn-custom-pri {
            background-color: rgb(255, 136, 0);
            border-color: #D97706;
            color: white;
        }

        .btn-custom-sec {
            background-color: rgb(189, 101, 0);
            border-color: rgba(255, 136, 1, 0.73);
            color: white;
        }

        .btn-custom-pri:hover, .btn-custom-sec:hover {
            background-color: rgba(180, 83, 9, 0);
            border-color: #B45309;
        }

        .nav-link {
            position: relative;
        }

        .nav-link:hover::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 100%;
            height: 2px;
            background-color: rgba(180, 83, 9, 0.6);
        }

        .dropdown-menu {
            background-color: rgba(52, 48, 45, 0.59);
        }

        .dropdown-item {
            background-color: rgba(52, 48, 45, 0.59);
            color: white;
        }

        .dropdown-item:hover {
            background-color: rgba(180, 83, 9, 0.6);
            color: black;
        }

        .offcanvas-body {
            background-color: rgba(180, 83, 9, 0.6); /* Colore di sfondo del menu a tendina */
        }

        .offcanvas-header {
            background-color: rgba(52, 48, 45, 0.59); /* Colore di sfondo del menu a tendina */
        }

        /* Aggiungi padding al contenuto principale per evitare che la navbar copra il contenuto */
        main {
            padding-top: 70px; /* Altezza della navbar */
        }

        /* Stili per i riquadri degli eventi */
        .event-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .event-card img {
            max-height: 200px;
            object-fit: cover;
            transition: filter 0.3s ease-in-out;
        }

        .event-card .card-body {
            flex: 1;
        }

    </style>

     <!-- Bootstrap JS and dependencies -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    @yield('head')
</head>
<body class="bg-dark text-white">
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg border-bottom py-2 navbar-custom fixed-top">
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
                    <ul class="navbar-nav mx-auto my-auto">
                        <li class="nav-item mx-4">
                            <a href="{{ route('events.index') }}" class="nav-link text-center">Eventi</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('events.create') }}" class="nav-link text-center">Crea</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="#" class="nav-link text-center">Help</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('about') }}" class="nav-link text-center">Chi Siamo?</a>
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
                                <a id="navbarDropdown" class="btn btn-custom-sec dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
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
                            <a href="{{ route('login') }}" class="btn btn-custom-sec ms-3">Accedi</a>
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
                        <a class="nav-link" href="#">3ESEMPIO</a>
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

        <!-- Qui verrà inserito il contenuto specifico della pagina -->
        <main>
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
