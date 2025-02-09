@extends('layouts.main')

@section('title', 'Torbit - Benvenuto')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white" style="background: gray; padding: 100px 0;">
        <div class="container">
            <h1 class="display-4">Benvenuto su Torbit</h1>
            <p class="lead">Scopri gli eventi più interessanti a Ferrara, organizzati sia da te che dagli altri utenti!</p>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <a href="#" class="btn btn-custom-pri btn-lg me-3">Scopri Eventi</a>
                @if (Route::has('login'))
                    @auth
                        <a href="#" class="btn btn-custom-pri btn-lg me-3">Crea un nuovo Evento</a>
                    @else
                        <a href="#" class="btn btn-custom-pri btn-lg">Accedi per Inserire Evento</a>
                    @endauth
                @endif
            </div>
            <!-- Search Bar -->
            <div class="mt-5">
                <form action="#" method="GET" class="d-flex justify-content-center">
                    <input type="text" name="query" class="form-control form-control-lg me-2" placeholder="Cerca eventi..." required>
                    <button type="submit" class="btn btn-custom-pri btn-lg">Cerca</button>
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
