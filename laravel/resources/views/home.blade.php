@extends('layouts.main')

@section('title', 'Home - E-vents')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <div class="container" style="position: relative; z-index: 1; background-color: rgba(109, 109, 109, 0.605); border-radius: 10px; padding: 20px;">
        <h1>Benvenuto, {{ Auth::user()->name }}</h1>
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.pending') }}" class="btn btn-primary">Eventi in attesa di approvazione</a>
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
                                <img src="{{ asset($event->image_path) }}" alt="Event Image">
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
                                <img src="{{ asset($event->image_path) }}" alt="Event Image">
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
