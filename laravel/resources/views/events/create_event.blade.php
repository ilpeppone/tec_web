@extends('layouts.main')

@section('title', 'Create Event - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        <h1 class="display-4">Crea un nuovo Evento</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" id="title" class="form-control bg-secondary text-white" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" class="form-control bg-secondary text-white" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" name="image" id="image" class="form-control bg-secondary text-white">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Luogo</label>
                <select name="location" id="location" class="form-control bg-secondary text-white">
                    <option value="indoor">Al chiuso</option>
                    <option value="outdoor">All'aperto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">Data dell'evento</label>
                <input type="datetime-local" name="event_date" id="event_date" class="form-control bg-secondary text-white" required>
            </div>
            <button type="submit" class="btn btn-custom-pri w-100">Crea</button>
        </form>
    </div>
</section>
@endsection
