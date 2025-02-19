<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'E-vents'))</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <!-- stili custom -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        .password-help {
            display: none;
            color: #ffc107;
        }

        .no-scroll {
            overflow: hidden;
        }

        .form-control::placeholder {
            color:rgba(157, 157, 157, 0.74) !important;
        }

    </style>

     <!-- bootstrap JS and dependencies -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    @yield('head')
</head>
<body class="bg-dark text-white no-scroll">
    <div id="app">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg py-2 fixed-top">
            <div class="container">
                    
                    <!-- toggle dispositivi mobili -->
                    <button class="navbar-toggler d-lg-none" style="background-color:#6d6d6d;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- logo -->
                    <a href="{{ url('/') }}" class="navbar-brand mx-auto">
                        <img src="{{ asset('images/logoExt.png') }}" width="144" height="34" alt="Logo">
                    </a>

                <!-- menu di navigazione dispositivi grandi -->
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
            </div>
        </nav>

        <!-- Off-canvas menu dispositivi mobili -->
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
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contattaci</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <main style="padding-top: 20px">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
