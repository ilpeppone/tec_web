@extends('layouts.main')

@section('title', 'Create Event - E-vents')

@section('content')
<section class="hero-section text-center" style="position: relative; padding: 100px 0;">
    <div class="container" style="position: relative; z-index: 1; color: white; background-color: #6d6d6d; border-radius: 10px; padding: 40px;">
        <h1 class="display-4">Crea un nuovo Evento</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Titolo di massimo 20 caratteri" required value="{{ old('title') }}" maxlength="20" autofocus>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Inserisci qui la descrizione dell'evento e tutte le caratteristiche che desideri far conoscere agli altri utenti" required style="height: 380px">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="is_outdoor" class="form-label">Luogo</label>
                        <select name="is_outdoor" id="is_outdoor" class="form-control">
                            <option value="0" {{ old('is_outdoor') == '0' ? 'selected' : '' }}>Al chiuso</option>
                            <option value="1" {{ old('is_outdoor') == '1' ? 'selected' : '' }}>All'aperto</option>
                        </select>
                        @error('is_outdoor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="event_date" class="form-label">Data dell'evento</label>
                        <input type="date" name="event_date" id="event_date" class="form-control" required min="{{ date('Y-m-d') }}" value="{{ old('event_date') }}">
                        @error('event_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="max_participants" class="form-label">Numero massimo di partecipanti</label>
                        <input type="number" name="max_participants" id="max_participants" class="form-control" placeholder="es. 20" required value="{{ old('max_participants') }}">
                        @error('max_participants')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="indirizzo di esempio" required value="{{ old('address') }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" step="0.01" name="price" id="price" placeholder=" '0' se l'evento non richirde soldi" class="form-control" required value="{{ old('price') }}">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-custom-pri w-100">Crea</button>
        </form>
    </div>
</section>
@endsection
