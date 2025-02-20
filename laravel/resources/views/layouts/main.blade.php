<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'E-vents'))</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- stile custom -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    @yield('head')
</head>

<body class="bg-dark text-white">
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

                    <!-- tasti account -->
                    <div class="collapse navbar-collapse d-none d-lg-flex">
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
                                                {{ __('Profilo') }}
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

        <!-- off-canvas menu dispositivi mobili -->
        <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                    </li>
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
                    
                    <!-- tasti account offcanvas -->
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style="color: orange" href="#" id="mobileAuthDropdown" role="button" data-bs-toggle="dropdown">
                                    @if(Auth::user()->role === 'admin')
                                        <i class="bi bi-shield-check" title="Admin"></i>
                                    @endif
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('home') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('home-form').submit();">
                                            {{ __('Profilo') }}
                                        </a>
                                        <form id="home-form" action="{{ route('home') }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    @if(Auth::user()->role !== 'admin')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.promote.form') }}">
                                                {{ __('Diventa Admin') }}
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link" style="color: orange">Accedi</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link" style="color: orange">Registrati</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>   
        </div>

        <!-- breadcrumbs: visibile se definito -->
        <div class="breadcrumb-container">
            <div class="breadcrumb-inner container">
                <ol class="breadcrumb">
                    @hasSection('breadcrumbs')
                        @yield('breadcrumbs')
                    @else                                
                        {{ Breadcrumbs::render() }}
                    @endif
                </ol>
            </div>
        </div>      

        <main> 
            @yield('content')
        </main>
    </div>
    
    <footer class="text-white py-4" style="margin-top: 40px; background-color: #4E5051;">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} E-vents. Tutti i diritti riservati.</p>
            <p>
                <a href="{{ url('/privacy') }}" class="text-white me-3">Privacy Policy</a>
                <a href="{{ url('/terms') }}" class="text-white">Termini di Utilizzo</a>
            </p>
        </div>
    </footer>

    <script>
        window.onload = function() {
            let screenWidth = window.innerWidth;
            let isMobile = screenWidth < 768;  

            document.cookie = "is_mobile=" + (isMobile ? "1" : "0");
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
