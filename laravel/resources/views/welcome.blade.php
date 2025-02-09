@extends('layouts.main')

{{-- Imposta il titolo della pagina --}}
@section('title', 'Torbit - Home')

{{-- Sezione per script e stili specifici --}}
@section('head')
   
@endsection

{{-- Contenuto principale della pagina --}}
@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white" style="background: url('{{ asset('images/hero-bg.jpg') }}') no-repeat center center/cover; padding: 100px 0;">
        <div class="container">
            <h1 class="display-4">Benvenuto su Torbit</h1>
            <p class="lead">La piattaforma definitiva per la gestione dei tornei di videogiochi</p>
            <a href="{{ url('/tournaments') }}" class="btn btn-custom-pri btn-lg">Scopri i Tornei</a>
        </div>
    </section>

    <!-- Sezione: Tornei in Evidenza -->
    <section class="featured-tournaments py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Tornei in Evidenza</h2>
            <div class="row">
                <!-- Card Torneo 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/tournament1.jpg') }}" class="card-img-top" alt="Torneo FPS Challenge">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Torneo FPS Challenge</h5>
                            <p class="card-text">Sfida i migliori in un torneo di sparatutto in prima persona e dimostra le tue abilità.</p>
                            <a href="{{ url('/tournaments/1') }}" class="btn btn-custom-sec mt-auto">Partecipa</a>
                        </div>
                    </div>
                </div>
                <!-- Card Torneo 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/tournament2.jpg') }}" class="card-img-top" alt="Battle Royale Showdown">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Battle Royale Showdown</h5>
                            <p class="card-text">Entra in un'epica battaglia e cerca di sopravvivere fino all'ultimo.</p>
                            <a href="{{ url('/tournaments/2') }}" class="btn btn-custom-sec mt-auto">Partecipa</a>
                        </div>
                    </div>
                </div>
                <!-- Card Torneo 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/tournament3.jpg') }}" class="card-img-top" alt="Strategia e Squadre">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Strategia e Squadre</h5>
                            <p class="card-text">Un torneo di strategia dove tattica e lavoro di squadra sono fondamentali.</p>
                            <a href="{{ url('/tournaments/3') }}" class="btn btn-custom-sec mt-auto">Partecipa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sezione: Ultime Notizie -->
    <section class="latest-news py-5 ">
        <div class="container">
            <h2 class="mb-4 text-center">Ultime Notizie</h2>
            <div class="row">
                <!-- Card Notizia 1 -->
                <div class="col-md-6 mb-4">
                    <div class="news-card p-3 border">
                        <h4>Nuovo Torneo Annunciato!</h4>
                        <p>Stiamo per lanciare un nuovo torneo con premi straordinari. Preparati a competere con i migliori!</p>
                        <a href="{{ url('/news/1') }}" class="btn btn-custom-pri">Leggi di più</a>
                    </div>
                </div>
                <!-- Card Notizia 2 -->
                <div class="col-md-6 mb-4">
                    <div class="news-card p-3 border">
                        <h4>Aggiornamenti alla Piattaforma</h4>
                        <p>Scopri le nuove funzionalità che abbiamo aggiunto per migliorare l'esperienza dei tornei.</p>
                        <a href="{{ url('/news/2') }}" class="btn btn-custom-pri">Leggi di più</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sezione: Come Funziona -->
    <section class="how-it-works py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Come Funziona</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <i class="fas fa-user-plus fa-3x mb-3"></i>
                    <h5>Registrati</h5>
                    <p>Crea il tuo account e unisciti alla community di giocatori.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="fas fa-trophy fa-3x mb-3"></i>
                    <h5>Partecipa</h5>
                    <p>Iscriviti ai tornei che più ti interessano e metti alla prova le tue abilità.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="fas fa-award fa-3x mb-3"></i>
                    <h5>Vinci</h5>
                    <p>Raccogli premi esclusivi e scala la classifica dei migliori giocatori.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sezione: Partner -->
    <section class="partners py-5 bg-dark text-white">
        <div class="container">
            <h2 class="mb-4 text-center">I Nostri Partner</h2>
            <div class="row justify-content-center align-items-center">
                <div class="col-auto">
                    <img src="{{ asset('images/partner1.png') }}" alt="Partner 1" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-auto">
                    <img src="{{ asset('images/partner2.png') }}" alt="Partner 2" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-auto">
                    <img src="{{ asset('images/partner3.png') }}" alt="Partner 3" class="img-fluid" style="max-height: 80px;">
                </div>
            </div>
        </div>
    </section>

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
@endsection
