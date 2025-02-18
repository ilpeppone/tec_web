@extends('layouts.main')

@section('breadcrumbs')
    {{ Breadcrumbs::render('events.show', $event) }}
@endsection

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <div class="container" style="position: relative; z-index: 1; background-color: #6d6d6d; border-radius: 10px; padding: 20px;"">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif    <h1>{{ $event->title }}</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>{{ $event->description }}</p>
    <p><strong>Data dell'evento:</strong> {{ $event->event_date }}</p>
    <p><strong>Partecipanti massimi:</strong> {{ $event->max_participants }}</p>
    <p><strong>Indirizzo:</strong> {{ $event->address }}</p>
    <p><strong>Luogo:</strong> {{ $event->is_outdoor ? 'All\'aperto' : 'Al chiuso' }}</p>
    <p><strong>Prezzo:</strong> {{ $event->price }}</p>

    @if ($event->image_path)
        <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid" alt="{{ $event->title }}">
    @else
        <img src="{{ asset('images/ferrara.png') }}" class="img-fluid" alt="Evento">
    @endif
    <div class="mt-3 d-flex justify-content-center gap-4">
        <form action="{{ route('events.approve', $event->id) }}" method="POST" id="approve-form">
            @csrf
            @method('PATCH')
            <button type="button" class="btn btn-success btn-lg w-100 " onclick="confirmApprove()">Approva</button>
        </form>
        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" id="delete-form" class="ml-2">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger btn-lg w-100 " onclick="confirmDelete()">Elimina</button>
        </form>
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.pending') }}" class="btn btn-custom-pri w-25">Torna Indietro</a>
        </div>
</div>

<script>
    function confirmApprove() {
        Swal.fire({
            title: 'Sei sicuro di voler approvare questo evento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sì, approva!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('approve-form').submit();
            }
        });
    }

    function confirmDelete() {
        Swal.fire({
            title: 'Sei sicuro di voler cancellare questo evento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sì, cancella!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    }
</script>
</section>
@endsection