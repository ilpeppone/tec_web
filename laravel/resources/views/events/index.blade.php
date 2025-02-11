@extends('layouts.main')

@section('title', 'Eventi - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        <h1 class="display-4">Eventi</h1>
        <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg me-3">Crea un nuovo Evento</a>
        <div class="row mt-4">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="event-card border">
                        @if ($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}" loading="lazy">
                        @else
                            <img src="https://via.placeholder.com/300" class="img-fluid" alt="Evento" loading="lazy">
                        @endif
                        <div class="p-3">
                            <h4>{{ $event->title }}</h4>
                            <p class="text-muted">{{ Str::limit($event->description, 100) }}</p>
                            <p class="text-muted"><i class="fa fa-calendar"></i> {{ $event->event_date }}</p>
                            <p class="text-muted"><i class="fa fa-users"></i> Partecipanti: {{ $event->participants_count }}</p>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-custom-pri">Scopri di più</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
