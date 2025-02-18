@extends('layouts.main')

@section('title', 'Eventi - E-vents')

@section('content')
<div class="container py-5 text-center">
    <div class="container" style="position: relative; z-index: 1; background-color: #4f4f4f; border-radius: 15px; padding: 40px; margin-bottom: 30px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <h1 class="display-4 text-white mb-4" style="font-weight: 700;">Esplora Eventi</h1>
        @if (Route::has('login'))
            @auth
                <p class="lead text-white" style="font-size: 1.2rem;">Ciao {{ Auth::user()->name }}! Sei pronto a scoprire eventi incredibili? Trova quelli che più ti piacciono o, se non trovi nulla che ti ispira:</p>
                <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg mb-5">
                    Crea il tuo Evento
                </a>
            @else
                <p class="lead text-white" style="font-size: 1.2rem;">Sei pronto a scoprire eventi incredibili? Trova quelli che più ti piacciono o, se non trovi nulla che ti ispira:</p>
                <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg mb-5">
                    Accedi per iniziare a creare Eventi
                </a>
            @endauth
        @endif

    <!-- Eventi con più iscritti -->
    <x-event-carousel :events="$mostSubscribedEvents" carouselId="mostSubscribedEventsCarousel" title="Eventi con più iscritti" />

    <!-- Eventi più recenti -->
    <x-event-carousel :events="$recentEvents" carouselId="recentEventsCarousel" title="Eventi più recenti" />

    <!-- Eventi di più recente creazione -->
    <x-event-carousel :events="$newlyCreatedEvents" carouselId="newlyCreatedEventsCarousel" title="Eventi di più recente creazione" />

    <!-- Barra dei Filtri -->
    <div class="container-fluid py-3" style="background-color: #6d6d6d; border-radius: 10px;">
            <h2 class="mb-4">Filtra eventi</h2>
        <form id="filter-form">
            <div class="row g-3 align-items-end justify-content-center"> <!-- Aggiungi align-items-end per allineare in basso -->
                <div class="col-md-3">
                    <label for="sortBy" class="form-label text-white">Ordina per:</label>
                    <select id="sortBy" name="sortBy" class="form-select">
                        <option value="title">Alfabetico</option>
                        <option value="date_asc">Data (più lontana)</option>
                        <option value="date_desc">Data (più recente)</option>
                        <option value="price_asc">Prezzo (crescente)</option>
                        <option value="price_desc">Prezzo (decrescente)</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="maxParticipants" class="form-label text-white">Mostra eventi pieni:</label>
                    <select id="maxParticipants" name="maxParticipants" class="form-select">
                        <option value="all">Tutti</option>
                        <option value="hide">Nascondi eventi pieni</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-custom-pri w-100">Filtra</button>
                </div>
            </div>
        </form>
        <!-- Lista Eventi -->
        <div id="events-container" class="mt-5">
            <div class="row">
                @foreach ($allEvents as $event)
                    <x-event-card :event="$event" />
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- AJAX per il filtraggio -->
<script>
document.getElementById("filter-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita il refresh della pagina

    let formData = new FormData(this);

    fetch("{{ route('events.filter') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: formData
    })
    .then(response => response.text()) // Otteniamo l'HTML generato
    .then(data => {
        document.getElementById("events-container").innerHTML = data; // Aggiorna la lista
    })
    .catch(error => console.error("Errore:", error));
});
</script>

@endsection
