@extends('layouts.main')
@section('title', 'E-vents - Contatti')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto" style="width:300px; length:50px;" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container py-5 text-center col-md-8 mx-auto" style="position: relative; z-index: 1; color: white; background-color: #6d6d6d50; border-radius: 10px; padding: 20px;">
    <h1 class="text-center mb-4">Contattaci</h1>
    <p class="text-center mb-5">Siamo qui per aiutarti. Contattaci per qualsiasi domanda o informazione.</p>
    
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Informazioni di Contatto</h2>
            <p><strong>Indirizzo:</strong> Via Cairoli 23, 44121 Ferrara, Italia</p>
            <p><strong>Telefono:</strong> +39  334 5088464</p>
            <p><strong>Email:</strong> E-vents@gmail.com</p>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Modulo di Contatto</h2>
            <form action="{{ route('contact.submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg text-white @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Mario Rossi" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg text-white @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="mario.rossi@example.com" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Messaggio</label>
                    <textarea id="message" name="message" rows="5" class="form-control form-control-lg text-white @error('message') is-invalid @enderror" value="{{ old('message') }}" placeholder="Vorrei contattarvi per ..." required></textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-custom-pri">Invia</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 5000); // Sparisce dopo 5 secondi
</script>
