@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Contattaci</h1>
    <p class="text-center mb-5">Siamo qui per aiutarti. Contattaci per qualsiasi domanda o informazione.</p>
    
    <div class="row">
        <div class="col-md-6">
            <h2>Informazioni di Contatto</h2>
            <p><strong>Indirizzo:</strong> Via Esempio 123, 00100 Roma, Italia</p>
            <p><strong>Telefono:</strong> +39 06 12345678</p>
            <p><strong>Email:</strong> info@esempio.com</p>
        </div>
        <div class="col-md-6">
            <h2>Modulo di Contatto</h2>
            <form action="{{ route('contact.submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" id="name" name="name" class="form-control bg-secondary text-white @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Mario Rossi" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control bg-secondary text-white @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="mario.rossi@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Messaggio</label>
                    <textarea id="message" name="message" rows="5" class="form-control bg-secondary text-white @error('message') is-invalid @enderror" value="{{ old('message') }}" placeholder="Vorrei contattarvi per ..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>
@endsection
