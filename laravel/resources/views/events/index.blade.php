@extends('layouts.main')

@section('title', 'Eventi - E-vents')

@section('content')
<div class="container py-5 text-center">
    <h1 class="display-4 text-center mb-5">Eventi</h1>
    <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg mb-5">Crea un nuovo Evento</a>

    <!-- Eventi con più iscritti -->
    <x-event-carousel :events="$mostSubscribedEvents" carouselId="mostSubscribedEventsCarousel" title="Eventi con più iscritti" />

    <!-- Eventi più recenti -->
    <x-event-carousel :events="$recentEvents" carouselId="recentEventsCarousel" title="Eventi più recenti" />

    <!-- Eventi di più recente creazione -->
    <x-event-carousel :events="$newlyCreatedEvents" carouselId="newlyCreatedEventsCarousel" title="Eventi di più recente creazione" />

    <!-- Tutti gli eventi -->
    <h2 class="mb-4">Tutti gli eventi</h2>
    <div class="row">
        @foreach ($allEvents as $event)
            <x-event-card :event="$event" />
        @endforeach
    </div>
</div>
@endsection

