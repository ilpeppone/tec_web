<style>
    .placeholder{
        color: aliceblue;
    }
</style>
@extends('layouts.main')

@section('title', 'E-vents - Benvenuto')

@section('content')

   <!-- Hero Section -->
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

        <!-- Search Bar -->
        <div class="mt-5">
            <form action="{{ route('events.search') }}" method="GET" class="d-flex justify-content-center" >
                <input type="text" name="query" class="form-control form-control-lg me-2" placeholder="Termine nella descrizione">
                <input type="date" name="date" class="form-control form-control-lg me-2">
                <select name="location" class="form-control form-control-lg me-2">
                    <option value="">Tutti i luoghi</option>
                    <option value="outdoor">All'aperto</option>
                    <option value="indoor">Al chiuso</option>
                </select>
                <select name="cost" class="form-control form-control-lg me-2">
                    <option value="">Tutti i costi</option>
                    <option value="free">Gratis</option>
                    <option value="paid">A pagamento</option>
                </select>
                <button type="submit" class="btn btn-custom-pri btn-lg ms-2">Cerca</button>
            </form>
        </div>
    </div>
</section>

<!-- Sezione: Eventi in Evidenza (visualizzati come carosello) -->
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
