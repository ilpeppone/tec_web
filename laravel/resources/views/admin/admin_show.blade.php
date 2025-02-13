@extends('layouts.main')

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>{{ $event->description }}</p>
    <p><strong>Data dell'evento:</strong> {{ $event->event_date }}</p>
    <p><strong>Partecipanti massimi:</strong> {{ $event->max_participants }}</p>
    <p><strong>Indirizzo:</strong> {{ $event->address }}</p>
    @if ($event->image_path)
        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}">
    @else
        <img src="{{ asset('images/ferrara.png') }}" class="img-fluid" alt="Evento">
    @endif
    <form action="{{ route('events.approve', $event->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success">Approva</button>
    </form>
</div>
@endsection