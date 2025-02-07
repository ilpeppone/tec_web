<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Stili custom (eventualmente per le card) -->
    <style>
        .card-header {
            background: black;
            color: #f1f1f1;
        }
        .card-body,
        .card {
            background-color: #122121;
            color: #f1f1f1;
        }
    </style>

    {{-- Sezione per includere ulteriori risorse nel <head> --}}
    @yield('head')
</head>
<body class="bg-dark text-white">
    <div id="app">
        <!-- Navbar -->
        <nav class="border-bottom mb-4">
            <div class="container d-flex align-items-center justify-content-between py-3">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="text-decoration-none">
                    <!-- SVG Logo (versione semplificata per esempio) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="90" viewBox="0 0 100 90" fill="none">
                        <path d="M10 10 L50 10 L30 50 Z" fill="#5e3e31"/>
                    </svg>
                </a>
                <!-- Menu di navigazione -->
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Sezione principale dei contenuti -->
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Sezione per eventuali script aggiuntivi --}}
    @yield('scripts')
</body>
</html>
