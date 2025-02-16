@extends('layouts.main')

@section('title', 'Eventi - Torbit')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-center mb-5">Eventi</h1>
    <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg mb-5">Crea un nuovo Evento</a>

    <!-- Eventi con più iscritti -->
    <h2 class="mb-4">Eventi con più iscritti</h2>
    <div id="mostSubscribedEventsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($mostSubscribedEvents->chunk(3) as $chunk)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <div class="row justify-content-center">
                        @foreach ($chunk as $event)
                            <div class="col-md-3 mb-4">
                                <div class="event-card border">
                                    @if ($event->image_path)
                                        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                                    @else
                                        <div class="no-image">No Image Available</div>
                                    @endif
                                    <div class="card-body p-3">
                                        <h4>{{ $event->title }}</h4>
                                        <p class="text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
                                        <p class="text-muted"><i class="fa fa-users"></i> Partecipanti: {{ $event->participants_count }}</p>
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-custom-pri">Scopri di più</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mostSubscribedEventsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mostSubscribedEventsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators">
            @foreach ($mostSubscribedEvents->chunk(3) as $index => $chunk)
                <button type="button" data-bs-target="#mostSubscribedEventsCarousel" data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide {{ $index + 1 }}">
                    <img src="{{ asset('storage/' . $chunk->first()->image_path) }}" class="d-block w-100 img-thumbnail" alt="Event {{ $index + 1 }}">
                </button>
            @endforeach
        </div>
    </div>

    <!-- Eventi più recenti -->
    <h2 class="mb-4">Eventi più recenti</h2>
    <div id="recentEventsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($recentEvents->chunk(3) as $chunk)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <div class="row justify-content-center">
                        @foreach ($chunk as $event)
                            <div class="col-md-3 mb-4">
                                <div class="event-card border">
                                    @if ($event->image_path)
                                        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                                    @else
                                        <div class="no-image">No Image Available</div>
                                    @endif
                                    <div class="card-body p-3">
                                        <h4>{{ $event->title }}</h4>
                                        <p class="text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
                                        <p class="text-muted"><i class="fa fa-users"></i> Partecipanti: {{ $event->participants_count }}</p>
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-custom-pri">Scopri di più</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#recentEventsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#recentEventsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators">
            @foreach ($recentEvents->chunk(3) as $index => $chunk)
                <button type="button" data-bs-target="#recentEventsCarousel" data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide {{ $index + 1 }}">
                    <img src="{{ asset('storage/' . $chunk->first()->image_path) }}" class="d-block w-100 img-thumbnail" alt="Event {{ $index + 1 }}">
                </button>
            @endforeach
        </div>
    </div>

    <!-- Eventi di più recente creazione -->
    <h2 class="mb-4">Eventi di più recente creazione</h2>
    <div id="newlyCreatedEventsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($newlyCreatedEvents->chunk(3) as $chunk)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <div class="row justify-content-center">
                        @foreach ($chunk as $event)
                            <div class="col-md-3 mb-4">
                                <div class="event-card border">
                                    @if ($event->image_path)
                                        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                                    @else
                                        <div class="no-image">No Image Available</div>
                                    @endif
                                    <div class="card-body p-3">
                                        <h4>{{ $event->title }}</h4>
                                        <p class="text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
                                        <p class="text-muted"><i class="fa fa-users"></i> Partecipanti: {{ $event->participants_count }}</p>
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-custom-pri">Scopri di più</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#newlyCreatedEventsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#newlyCreatedEventsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators">
            @foreach ($newlyCreatedEvents->chunk(3) as $index => $chunk)
                <button type="button" data-bs-target="#newlyCreatedEventsCarousel" data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide {{ $index + 1 }}">
                    <img src="{{ asset('storage/' . $chunk->first()->image_path) }}" class="d-block w-100 img-thumbnail" alt="Event {{ $index + 1 }}">
                </button>
            @endforeach
        </div>
    </div>
</div>
@endsection

<style>
.no-image {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 200px; /* Altezza del riquadro dell'immagine */
    background-color: #212529; /* Colore di sfondo */
    color: #888; /* Colore del testo */
    font-size: 16px; /* Dimensione del testo */
    text-align: center;
}

/* Separazione tra gli indicatori e le card */
.carousel-indicators {
    margin-top: 20px; /* Aggiungi margine sopra gli indicatori */
}

/* Aggiungi margine tra gli items per un po' di spazio */
.carousel-inner {
    padding-bottom: 20px; /* Puoi aumentare o diminuire questo valore */
}

/* Margine extra tra le card se necessario */
.carousel-item {
    padding-bottom: 20px; /* Aggiungi margine tra la sezione delle card e gli indicatori */
}

</style>
