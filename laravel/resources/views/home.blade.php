@extends('layouts.main')

@section('title', 'Home - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        @if(isset($user))
            <h1 class="display-4">Benvenuto, {{ $user->name }}!</h1>
        @else
            <h1 class="display-4">Benvenuto, ospite!</h1>
        @endif

        <!-- Menu a tendina per filtrare gli eventi -->
        <div class="dropdown my-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterMenu" data-bs-toggle="dropdown" aria-expanded="false">
                Filtra eventi
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterMenu">
                <li><a class="dropdown-item" href="#" onclick="filterEvents('all')">Tutti gli eventi</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterEvents('created')">Eventi creati da me</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterEvents('subscribed')">Eventi a cui sono iscritto</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterEvents('pending')">Eventi in attesa di approvazione</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterEvents('approved')">Eventi approvati</a></li>
            </ul>
        </div>

        <!-- Sezione eventi creati dall'utente -->
        <div id="createdEventsSection">
            <h2 class="mb-4">Eventi creati da me</h2>
            <div class="row">
                @foreach ($createdEvents as $event)
                    <div class="col-md-4 mb-4">
                        <div class="event-card border">
                            @if ($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                            @else
                                <img src="{{ asset('images/ferrara.png') }}" class="img-fluid" alt="Evento" loading="lazy">
                            @endif
                            <div class="card-body p-3">
                                <h4>{{ $event->title }}</h4>
                                <p class="text-muted"><i class="fa fa-calendar"></i> {{ $event->event_date }}</p>
                                <p class="text-muted"><i class="fa fa-users"></i> Partecipanti: {{ $event->participants()->count() }}</p>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">View Event</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Sezione eventi a cui l'utente è iscritto -->
        <div id="subscribedEventsSection">
            <h2 class="mb-4">Eventi a cui sono iscritto</h2>
            <div class="row">
                @foreach ($subscribedEvents as $event)
                    <div class="col-md-4 mb-4">
                        <div class="event-card border">
                            @if ($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                            @else
                                <img src="{{ asset('images/ferrara.png') }}" class="img-fluid" alt="Evento" loading="lazy">
                            @endif
                            <div class="card-body p-3">
                                <h4>{{ $event->title }}</h4>
                                <p class="text-muted"><i class="fa fa-calendar"></i> {{ $event->event_date }}</p>
                                <p class="text-muted"><i class="fa fa-users"></i> Partecipanti: {{ $event->participants()->count() }}</p>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">View Event</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    function filterEvents(filter) {
        var createdEventsSection = document.getElementById('createdEventsSection');
        var subscribedEventsSection = document.getElementById('subscribedEventsSection');

        if (filter === 'created') {
            createdEventsSection.style.display = 'block';
            subscribedEventsSection.style.display = 'none';
        } else if (filter === 'subscribed') {
            createdEventsSection.style.display = 'none';
            subscribedEventsSection.style.display = 'block';
        } else {
            createdEventsSection.style.display = 'block';
            subscribedEventsSection.style.display = 'block';
        }
    }
</script>
@endsection
