@extends('layouts.main')

@section('title', 'Risultati della ricerca')

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
        <h1>Risultati della ricerca</h1>
        @if($events->isEmpty())
            <p>Nessun evento trovato.</p>
        @else
            <div class="row">
            <div class="row">
            @foreach ($events as $event)
                <x-event-card :event="$event" />
            @endforeach
        </div>

        @endif
    </div>
@endsection
</section>
