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
                </button>
            @endforeach
        </div>
    </div>
</div>
@endsection

<style>
/* Selettore più specifico per l'indicatore attivo */
#mostSubscribedEventsCarousel .carousel-indicators .active,
#recentEventsCarousel .carousel-indicators .active,
#newlyCreatedEventsCarousel .carousel-indicators .active {
    background-color: #B45309 !important; /* Arancione con !important per sovrascrivere */
}
</style>
