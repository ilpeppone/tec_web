@extends('layouts.main')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            * {
                
                background: #333;
            }
            body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            }
            footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px;
            }
            main{
                flex:1;
            }
            #post-carousel {
            width: 70%;
            max-width: 600px;
            }
        </style>
        <script src="{{ asset('js/script.js') }}"></script>
    </head>
    <body class="bg-dark text-white">
        <main>
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        
  
  

        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    
    </main>
    <footer class="py-16 text-center text-sm text-white dark:text-white/70" style="background-color: #122121;">
    Giuseppe Viggiano <span style="margin-left: 2em;"></span>Riccardo Augusto Chira
    </footer>

    </body>
</html>
