<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Torbit') }}</title>

     <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Stili custom -->
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
        
        .navbar {
            min-height: 50px; 
        }

        .btn-custom-pri {
            background-color:rgb(217, 119, 6); /* Arancione rame */
            border-color: #D97706;
            color: white;
        }

        .btn-custom-sec {
            background-color:rgb(217, 119, 6); /* Arancione rame */
            border-color:rgba(217, 119, 6, 0.73);
            color: white;
        }

        .btn-custom-pri:hover {
            background-color:rgba(180, 83, 9, 0); /* Più scuro */
            border-color: #B45309;
        }

        .btn-custom-sec:hover {
            background-color:rgba(180, 83, 9, 0); /* Più scuro */
            border-color: #B45309;
        }

        .nav-item:hover{
            background-color:rgba(180, 83, 9, 0.6); /* Più scuro */
            color: white;
        }
        
    </style>

    @yield('head')
</head>
<body class="bg-dark text-white">
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom py-2">
            <div class="container">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('images/logoExt.png') }}" width="180" height="44" alt="Logo">
                </a>

                <!-- Toggle per dispositivi mobili -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu di navigazione -->
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
