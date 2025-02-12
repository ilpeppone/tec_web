@extends('layouts.main')

@section('title', $event->title . ' - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="display-4">{{ $event->title }}</h1>
        <p class="lead">{{ $event->description }}</p>
        @if ($event->image_path)
            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="img-fluid mb-3">
        @endif
        <p><strong>Data:</strong> {{ $event->event_date }}</p>
        <p><strong>Luogo:</strong> {{ $event->is_outdoor ? 'All\'aperto' : 'Al chiuso' }}</p>
        <p><strong>Indirizzo:</strong> {{ $event->address }}</p>
        <p><strong>Numero massimo di partecipanti:</strong> {{ $event->max_participants }}</p>
        <p><strong>Partecipanti attuali:</strong> {{ $event->participants()->count() }}</p>
        @if (Auth::check())
            @if ($event->participants->contains(Auth::user()))
                <form action="{{ route('events.unparticipate', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg me-3">Disiscriviti</button>
                </form>
            @elseif ($event->participants()->count() < $event->max_participants)
                <form action="{{ route('events.participate', $event->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg me-3">Partecipa</button>
                </form>
            @else
                <button class="btn btn-secondary btn-lg me-3" disabled>Numero massimo di partecipanti raggiunto</button>
            @endif
        @endif
        @if(auth()->user()->id === $event->user_id)
            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Event</button>
            </form>
        @endif
        @if(auth()->user()->is_admin && !$event->approved)
            <form action="{{ route('events.approve', $event->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-primary">Approve Event</button>
            </form>
        @endif
        <a href="{{ route('events.index') }}" class="btn btn-secondary btn-lg">Torna indietro</a>
    </div>
</section>
@endsection
