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

    <!-- Stili custom -->
    <style>
        /* Inserisci qui il tuo CSS personalizzato */
        .card-header {
            background: black;
            color: #f1f1f1;
        }
        .card-body,
        .card {
            background-color: #122121;
            color: #f1f1f1;
        }
        .navbar {
            min-height: 50px;
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
            background-color: rgba(188, 85, 17, 0.6);
            color: black;
        }
    </style>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @yield('head')
</head>
<body class="bg-dark text-white">
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom py-2">
            <div class="container">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('images/logoExt.png') }}" width="144" height="34" alt="Logo">
                </a>

                <!-- Toggle per dispositivi mobili -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu di navigazione -->
                <div class="collapse navbar-collapse">
                    <!-- Links Centrali -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-center">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-center">Contact</a>
                        </li>
                    </ul>

                    <!-- Auth (Login, Register o Utente) -->
                    <div class="ms-auto d-flex align-items-center">
                        @if (Route::has('login'))
                            @auth
                                <div class="nav-item dropdown">
                                    <a id="navbarDropdown" class="btn btn-custom-sec dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="vr mx-3 d-none d-lg-block" style="height: 30px; background-color: rgba(255, 255, 255, 0.3);"></div>
                                <a href="{{ route('login') }}" class="btn btn-custom-sec ms-3">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-custom-pri ms-3">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Qui verrà inserito il contenuto specifico della pagina -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
