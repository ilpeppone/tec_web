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

        @import url('https://fonts.googleapis.com/css?family=Cardo:400i|Rubik:400,700&display=swap');

        /* Inserisci qui il tuo CSS personalizzato */
        .card-header {
            background: black;
            color: #f1f1f1;
        }

        .card-body {
            background-color: #6c757d; /* Stesso background della navbar */
            color: black; /* Testo in nero */
        }

        .navbar {
            min-height: 50px;
            background-color: #4e5051; /* Grigio */
        }

        .nav-link {
            position: relative;
            color: white;
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


        .btn-custom-pri{
            background-color: rgb(255, 136, 0);
            border-color: #f6f6f6;
            border-width: 2px;
            color: white;
        }

        .btn-custom-pri:hover {
            background-color: rgb(255, 154, 40);
            border-color: #000000;
            color: black;
        }

        .offcanvas-header {
            background-color: #6c757d81; /* Colore di sfondo del menu a tendina */
        }

        .offcanvas-body {
            background-color: #6c757d; /* Colore di sfondo del menu a tendina */
        }

        .dropdown-menu {
            background-color: rgb(52, 48, 45);
            color: white;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: rgba(180, 83, 9, 0.6);
            color: black;
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
        
        .no-image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px; /* Altezza del riquadro dell'immagine */
            background-color: #212529; /* Colore di sfondo */
            color: #888; /* Colore del testo */
            font-size: 16px; /* Dimensione del testo */
            text-align: center;
        }

        /* Separazione tra gli indicatori e le card */
        .carousel-indicators {
            margin-top: 20px; /* Aggiungi margine sopra gli indicatori */
        }

        /* Aggiungi margine tra gli items per un po' di spazio */
        .carousel-inner {
            padding-bottom: 20px; /* Puoi aumentare o diminuire questo valore */
        }

        /* Margine extra tra le card se necessario */
        .carousel-item {
            padding-bottom: 20px; /* Aggiungi margine tra la sezione delle card e gli indicatori */
        }

        .form-control {
            background-color: #323406b1;/* Grigio */
            color: white; /* Testo in bianco */
        }
        .form-control:focus{
            background-color: #323406b1; /* Grigio */
            color: white; /* Testo in bianco */
        }

        .form-control::placeholder {
            color: white; /* Testo in bianco */
        }

        :root {
        --d: 700ms;
        --e: cubic-bezier(0.19, 1, 0.22, 1);
        --font-sans: 'Rubik', sans-serif;
        --font-serif: 'Cardo', serif;
        }

        * {
        box-sizing: border-box;
        }

        html, body {
        height: 100%;
        }

        body {
        font-family: var(--font-sans);
        }

        /* Impostazioni base della card */
        .card {  
        position: relative;
        display: flex;
        align-items: flex-end;
        overflow: hidden;
        padding: 1rem;
        width: 100%;
        text-align: center;
        color: whitesmoke;
        background-color: whitesmoke;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1), 
                    0 2px 2px rgba(0,0,0,0.1), 
                    0 4px 4px rgba(0,0,0,0.1), 
                    0 8px 8px rgba(0,0,0,0.1),
                    0 16px 16px rgba(0,0,0,0.1);
        }

        /* Aumenta l'altezza delle cards */
        @media (min-width: 600px) {
        .card {
            height: 400px;
        }
        }

        /* Background impostato tramite la custom property --bg-url */
        .card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 110%;
        background-size: cover;
        background-position: center;
        background-image: var(--bg-url);
        transition: transform calc(var(--d) * 1.5) var(--e);
        pointer-events: none;
        }

        /* Gradient overlay */
        .card:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 200%;
        pointer-events: none;
        background-image: linear-gradient(
            to bottom,
            rgba(0,0,0,0) 0%,
            rgba(0,0,0,0.009) 11.7%,
            rgba(0,0,0,0.034) 22.1%,
            rgba(0,0,0,0.072) 31.2%,
            rgba(0,0,0,0.123) 39.4%,
            rgba(0,0,0,0.182) 46.6%,
            rgba(0,0,0,0.249) 53.1%,
            rgba(0,0,0,0.320) 58.9%,
            rgba(0,0,0,0.394) 64.3%,
            rgba(0,0,0,0.468) 69.3%,
            rgba(0,0,0,0.540) 74.1%,
            rgba(0,0,0,0.607) 78.8%,
            rgba(0,0,0,0.668) 83.6%,
            rgba(0,0,0,0.721) 88.7%,
            rgba(0,0,0,0.762) 94.1%,
            rgba(0,0,0,0.790) 100%
            );
        transform: translateY(-50%);
        transition: transform calc(var(--d) * 2) var(--e);
        }

        /* Contenuto interno */
        .content {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        padding: 1rem;
        transition: transform var(--d) var(--e);
        z-index: 1;
        }

        .content > * + * {
        margin-top: 1rem;
        }

        .title {
        font-size: 1.3rem;
        font-weight: bold;
        line-height: 1.2;
        }

        .copy {
        font-family: var(--font-serif);
        font-size: 1.125rem;
        font-style: italic;
        line-height: 1.35;
        }

        /* Nuova classe per la descrizione */
        .description {
        font-size: 0.9rem;
        margin-top: 0.5rem;
        font-style: normal;
        }

        /* Effetto hover (attivo su dispositivi con hover e schermi più larghi) */
        @media (hover: hover) and (min-width: 600px) {
        .card:after {
            transform: translateY(0);
        }
        .content {
            transform: translateY(calc(100% - 4.5rem));
        }
        .content > *:not(.title) {
            opacity: 0;
            transform: translateY(1rem);
            transition: transform var(--d) var(--e), opacity var(--d) var(--e);
        }
        .card:hover,
        .card:focus-within {
            align-items: center;
        }
        .card:hover:before,
        .card:focus-within:before {
            transform: translateY(-4%);
        }
        .card:hover:after,
        .card:focus-within:after {
            transform: translateY(-50%);
        }
        .card:hover .content,
        .card:focus-within .content {
            transform: translateY(0);
        }
        .card:hover .content > *:not(.title),
        .card:focus-within .content > *:not(.title) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: calc(var(--d) / 8);
        }
        .card:focus-within:before,
        .card:focus-within:after,
        .card:focus-within .content,
        .card:focus-within .content > *:not(.title) {
            transition-duration: 0s;
        }

        .breadcrumb-container {
            position: fixed;
            top: 50px; /* Altezza della navbar */
            width: 100%;
            z-index: 1030; /* Assicurati che sia sopra altri elementi */
        }

        .breadcrumb {
            background:rgb(95, 98, 99);
            padding: 1px 15px;
            border-radius: 3px;
        }

        .breadcrumb-item a {
            color: white; /* Arancione come i bottoni */
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color:  rgb(255, 136, 0);
        }
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
