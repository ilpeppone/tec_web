@extends('layouts.main')

@section('title', 'Dettagli Evento - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        <h1 class="display-4">{{ $event->title }}</h1>
        <p class="lead">{{ $event->description }}</p>
        @if ($event->image_path)
            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="img-fluid mb-3">
        @endif
        <p><strong>Data:</strong> {{ $event->event_date }}</p>
        <p><strong>Luogo:</strong> {{ $event->is_outdoor ? 'All\'aperto' : 'Al chiuso' }}</p>
        <p><strong>Indirizzo:</strong> {{ $event->address }}</p>
        <p><strong>Numero massimo di partecipanti:</strong> {{ $event->max_participants }}</p>
        <a href="#" class="btn btn-custom-pri btn-lg me-3">Partecipa</a>
        <a href="{{ route('events.index') }}" class="btn btn-secondary btn-lg">Torna indietro</a>
    </div>
</section>
@endsection
