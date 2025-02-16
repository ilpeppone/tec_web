@extends('layouts.main')

@section('title', 'Eventi - Torbit')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-center mb-5">Eventi</h1>
    <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg mb-5">Crea un nuovo Evento</a>

    <!-- Eventi con più iscritti -->
    <h2 class="mb-4">Eventi con più iscritti</h2>
    <div class="row mb-5">
        @foreach ($mostSubscribedEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="event-card border">
                    @if ($event->image_path)
                        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                    @else
                        <img src="{{ asset('images/ferrara.png') }}" class="img-fluid" alt="Evento" loading="lazy">
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

    <!-- Eventi più recenti -->
    <h2 class="mb-4">Eventi più recenti</h2>
    <div class="row mb-5">
        @foreach ($recentEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="event-card border">
                    @if ($event->image_path)
                        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                    @else
                        <img src="{{ asset('images/ferrara.png') }}" class="img-fluid" alt="Evento" loading="lazy">
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

    <!-- Eventi di più recente creazione -->
    <h2 class="mb-4">Eventi di più recente creazione</h2>
    <div class="row">
        @foreach ($newlyCreatedEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="event-card border">
                    @if ($event->image_path)
                        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                    @else
                        <img src="{{ asset('images/ferrara.png') }}" class="img-fluid" alt="Evento" loading="lazy">
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
@endsection
