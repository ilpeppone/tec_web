@extends('layouts.main')

@section('title', 'Torbit - Benvenuto')

@section('content')
   <!-- Hero Section -->
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        <h1 class="display-4">Benvenuto su Torbit</h1>
        <p class="lead">Scopri gli eventi più interessanti a Ferrara, organizzati sia da te che dagli altri utenti!</p>
        <div class="d-flex justify-content-center align-items-center mt-4">
            <a href="{{ route('events.index.public') }}" class="btn btn-custom-pri btn-lg me-3">Scopri Eventi</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg me-3">Crea un nuovo Evento</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-custom-pri btn-lg">Accedi per Inserire Evento</a>
                @endauth
            @endif
        </div>
   
            <!-- Search Bar -->
            <div class="mt-5">
                <form action="#" method="GET" class="d-flex justify-content-center">
                    <input type="text" name="query" class="form-control form-control-lg me-2" placeholder="Nome evento">
                    <select name="category" class="form-control form-control-lg me-2">
                        <option value="">Tutte le categorie</option>
                        <!-- Aggiungi qui altre categorie -->
                    </select>
                    <select name="location" class="form-control form-control-lg me-2">
                        <option value="">All'aperto</option>
                        <option value="">Al chiuso</option>
                        <!-- Aggiungi qui altre categorie -->
                    </select>
                    <button type="submit" class="btn btn-custom-pri btn-lg ms-2">Cerca</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Sezione: Eventi in Evidenza -->
    <section class="featured-events py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Eventi in Evidenza</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="event-card border">
                        <img src="https://via.placeholder.com/300" class="img-fluid" alt="Evento" loading="lazy">
                        <div class="p-3">
                            <h4>Nome Evento</h4>
                            <p class="text-muted">Descrizione breve dell'evento.</p>
                            <p class="text-muted"><i class="fa fa-calendar"></i> Data Evento</p>
                            <a href="#" class="btn btn-custom-pri">Scopri di più</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sezione: Newsletter -->
    <section class="newsletter py-5 bg-dark text-white">
        <div class="container">
            <h2 class="mb-4 text-center">Resta Aggiornato</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="#" method="POST" class="d-flex justify-content-center">
                        <input type="email" name="email" class="form-control form-control-lg w-100" placeholder="Inserisci la tua email" required>
                        <button type="submit" class="btn btn-custom-pri btn-lg ms-2">Iscriviti</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
