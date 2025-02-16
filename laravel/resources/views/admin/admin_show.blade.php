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
    <div class="mt-3">
        <form action="{{ route('events.approve', $event->id) }}" method="POST" id="approve-form">
            @csrf
            @method('PATCH')
            <button type="button" class="btn btn-success" onclick="confirmApprove()">Approva</button>
        </form>
        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" id="delete-form" class="mt-2">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Cancella</button>
        </form>
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
@endsection