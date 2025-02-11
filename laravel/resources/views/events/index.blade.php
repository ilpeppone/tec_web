@extends('layouts.main')

@section('title', 'Eventi - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        <h1 class="display-4">Eventi</h1>
        <a href="{{ route('events.create') }}" class="btn btn-custom-pri btn-lg me-3">Crea un nuovo Evento</a>
        <ul class="list-group mt-4">
            @foreach ($events as $event)
                <li class="list-group-item">
                    <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
