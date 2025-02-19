@extends('layouts.main')

@section('title', 'Home - E-vents')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <div class="container" style="position: relative; z-index: 1; background-color: #6d6d6d; border-radius: 10px; padding: 20px;">
        <h1 class="display-4" style="margin-bottom: 30px">Benvenuto, {{ Auth::user()->name }}</h1>
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.pending') }}" class="btn btn-custom-pri" style="padding:5px; margin:10px">Eventi in attesa di approvazione</a>
        @endif
      
        <!-- sezione eventi creati dall'utente -->
        <div id="createdEventsSection"> 
            <h2 class="mb-4">Eventi creati da me</h2>
            <div class="col-md-12">
            @if ($createdEvents->isEmpty())
                <p class="text-muted">Non hai creato nessun evento.</p>
            @else
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
                                @if ($event->approved)
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-custom-pri"><i class="bi bi-eye"></i> Visualizza</a>
                                @else
                                    <p class="text-muted">Evento in attesa di approvazione</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- sezione eventi a cui l'utente è iscritto -->
        <div id="subscribedEventsSection">
            <h2 class="mb-4">Eventi a cui sono iscritto</h2>
            @if ($subscribedEvents->isEmpty())
                    <div class="col-md-12">
                        <p class="text-muted">Non sei iscritto a nessun evento.</p>
            @else
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
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-custom-pri"><i class="bi bi-eye"></i> Visualizza</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
