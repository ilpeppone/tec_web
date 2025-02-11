@extends('layouts.main')

@section('title', 'Create Event - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        <h1 class="display-4">Crea un nuovo Evento</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" id="title" class="form-control bg-secondary text-white" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" class="form-control bg-secondary text-white" required></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" name="image" id="image" class="form-control bg-secondary text-white">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_outdoor" class="form-label">Luogo</label>
                <select name="is_outdoor" id="is_outdoor" class="form-control bg-secondary text-white">
                    <option value="0">Al chiuso</option>
                    <option value="1">All'aperto</option>
                </select>
                @error('is_outdoor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">Data dell'evento</label>
                <input type="text" name="event_date" id="event_date" class="form-control bg-secondary text-white" required>
                @error('event_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="max_participants" class="form-label">Numero massimo di partecipanti</label>
                <input type="number" name="max_participants" id="max_participants" class="form-control bg-secondary text-white" required>
                @error('max_participants')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" name="address" id="address" class="form-control bg-secondary text-white" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-custom-pri w-100">Crea</button>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#event_date", {
            dateFormat: "d/m/Y",
        });
    });
</script>
@endsection
