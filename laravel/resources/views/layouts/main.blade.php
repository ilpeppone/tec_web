<!doctype html>
<<<<<<< HEAD
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font (opzionale) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Figtree', sans-serif;
      background-color: #121212;
      color: #fff;
    }
    /* Navbar personalizzata */
    .navbar {
      background-color: #1e1e1e;
    }
    .navbar-brand, .nav-link {
      color: #fff !important;
    }
    /* Header/banner */
    .header {
      position: relative;
      background: url('banner.jpg') no-repeat center center;
      background-size: cover;
      height: 400px;
    }
    .header-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
    }
    .header-content {
      position: relative;
      z-index: 2;
    }
    /* Cards per le mod */
    .card {
      background-color: #1e1e1e;
      border: none;
    }
    .card-img-top {
      object-fit: cover;
      height: 200px;
    }
    .btn-primary {
      background-color: #ff5722;
      border-color: #ff5722;
    }
    .btn-primary:hover {
      background-color: #e64a19;
      border-color: #e64a19;
    }
    /* Footer */
    footer {
      background-color: #1e1e1e;
      padding: 1rem 0;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#"> 
      <img src="{{ asset('images/logoExt.png') }}" alt="Logo" width="108" height="100" class="d-inline-block align-text-top me-2"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Mod</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Forum</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Guide</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Contatti</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Accedi</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header / Banner -->
  <header class="header d-flex align-items-center">
    <div class="header-overlay"></div>
    <div class="container text-center header-content">
      <h1 class="display-4">Scopri i Tornei più Visitati</h1>
      <p class="lead">Guarda, inscriviti e gioca</p>
      <form class="d-flex justify-content-center mt-4">
        <input type="text" class="form-control w-50 me-2" placeholder="Cerca mod...">
        <button type="submit" class="btn btn-primary">Cerca</button>
      </form>
    </div>
  </header>

  <!-- Sezione Mod in Evidenza -->
  <section class="container my-5">
    <h2 class="mb-4">Mod in Evidenza</h2>
    <div class="row">
      <!-- Card 1 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="mod1.jpg" class="card-img-top" alt="Mod 1">
          <div class="card-body">
            <h5 class="card-title">Mod Avanzata 1</h5>
            <p class="card-text">Breve descrizione della mod e delle sue funzionalità.</p>
            <a href="#" class="btn btn-primary">Scopri di più</a>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="mod2.jpg" class="card-img-top" alt="Mod 2">
          <div class="card-body">
            <h5 class="card-title">Mod Avanzata 2</h5>
            <p class="card-text">Una descrizione breve per invogliare all’esplorazione.</p>
            <a href="#" class="btn btn-primary">Scopri di più</a>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="mod3.jpg" class="card-img-top" alt="Mod 3">
          <div class="card-body">
            <h5 class="card-title">Mod Avanzata 3</h5>
            <p class="card-text">Un riassunto delle principali caratteristiche.</p>
            <a href="#" class="btn btn-primary">Scopri di più</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p>&copy; 2025 Il Mio Sito di Mod. Tutti i diritti riservati.</p>
    </div>
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
=======
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
>>>>>>> main
</body>
</html>
