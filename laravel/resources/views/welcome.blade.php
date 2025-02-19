@extends('layouts.main')

@section('title', 'E-vents - Benvenuto')

@section('breadcrumbs')
    <!-- vuoto per non vedere le breadcrumbs -->
@endsection

@section('content')

   <!-- hero Section -->
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <div class="container" style="position: relative; z-index: 1; background-color: #6d6d6d; border-radius: 10px; padding: 20px;">
        <h1 class="display-4">Benvenuto su E-vents</h1>
        <p class="lead">Scopri gli eventi più interessanti a Ferrara, organizzati sia da te che dagli altri utenti!</p>
        <div class="d-flex justify-content-center align-items-center mt-4">
            <a href="{{ route('events.index') }}" class="btn btn-custom-pri btn-lg me-3">Scopri Eventi</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg me-3">Crea un nuovo Evento</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-custom-pri btn-lg">Accedi per Inserire Evento</a>
                @endauth
            @endif
        </div>

        <div class="mt-5">
            <form action="{{ route('events.search') }}" method="GET" class="row g-2 justify-content-center align-items-end">
                <div class="col-md-2 col-12">
                    <label for="term" class="form-label">Termini di ricerca</label>
                    <input type="text" name="query" id="term" class="form-control form-control-lg" placeholder="Cerca eventi">
                </div>
                
                <div class="col-md-2 col-12">
                    <label for="start_date" class="form-label">Data Inizio</label>
                    <input type="date" name="start_date" id="start_date" class="form-control form-control-lg">
                </div>
                
                <div class="col-md-2 col-12">
                    <label for="end_date" class="form-label">Data Fine</label>
                    <input type="date" name="end_date" id="end_date" class="form-control form-control-lg">
                </div>
                
                <div class="col-md-2 col-12">
                    <label for="location" class="form-label">Luogo</label>
                    <select name="location" id="location" class="form-control form-control-lg">
                        <option value="">Tutti i luoghi</option>
                        <option value="outdoor">All'aperto</option>
                        <option value="indoor">Al chiuso</option>
                    </select>
                </div>
                
                <div class="col-md-2 col-12">
                    <label for="cost" class="form-label">Costo</label>
                    <select name="cost" id="cost" class="form-control form-control-lg">
                        <option value="">Tutti i costi</option>
                        <option value="free">Gratis</option>
                        <option value="paid">A pagamento</option>
                    </select>
                </div>

                <div class="col-md-2 col-12 d-grid">
                    <button type="submit" class="btn btn-custom-pri btn-lg">Cerca  <i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- eventi in evidenza -->
<section class="featured-events py-5">
    <div class="container text-center">
        <x-event-carousel 
            :events="$featuredEvents" 
            carouselId="featuredEventsCarousel" 
            title="Eventi in Evidenza" 
        />
    </div>
</section>

@endsection
