@extends('layouts.main')

@section('title', $event->title . ' - Torbit')

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
        <h1 class="display-4">{{ $event->title }}</h1>
        <p class="lead">{{ $event->description }}</p>
        <div class="event-image">
            @if($event->image_path)
                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}">
            @else
                <div class="no-image">No Image Available</div>
            @endif
        </div>
        <p><strong>Data:</strong> {{ $event->event_date }}</p>
        <p><strong>Luogo:</strong> {{ $event->is_outdoor ? 'All\'aperto' : 'Al chiuso' }}</p>
        <p><strong>Indirizzo:</strong> {{ $event->address }}</p>
        <p><strong>Numero massimo di partecipanti:</strong> {{ $event->max_participants }}</p>
        <p><strong>Partecipanti attuali:</strong> {{ $event->participants()->count() }}</p>
        @if (Auth::check())
            <div class="d-flex flex-wrap justify-content-center gap-4">
                @if ($event->participants->contains(Auth::user()))
                    <form action="{{ route('events.unparticipate', $event->id) }}" method="POST" class="flex-fill" id="unparticipate-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-lg w-50" onclick="confirmUnparticipate()">Disiscriviti</button>
                    </form>
                @elseif ($event->participants()->count() < $event->max_participants)
                    <form action="{{ route('events.participate', $event->id) }}" method="POST" class="flex-fill" id="participate-form">
                        @csrf
                        <button type="button" class="btn btn-success btn-lg w-50" onclick="confirmParticipate()">Partecipa</button>
                    </form>
                @else
                    <button class="btn btn-secondary btn-lg w-50" disabled>Numero massimo di partecipanti raggiunto</button>
                @endif
                @if(auth()->user()->id === $event->user_id)
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="flex-fill" id="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-lg w-50" onclick="confirmDelete()">Delete Event</button>
                    </form>
                @endif
            </div>
        @endif
        
        <div class="text-center mt-3">
            <a href="{{ route('events.index') }}" class="btn btn-custom-sec btn-lg w-50">Altri Eventi</a>
        </div>
    </div>
</section>

<script>
    function confirmParticipate() {
        Swal.fire({
            title: 'Sei sicuro di voler partecipare a questo evento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sì, partecipa!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('participate-form').submit();
            }
        });
    }

    function confirmUnparticipate() {
        Swal.fire({
            title: 'Sei sicuro di voler disiscriverti da questo evento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sì, disiscriviti!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('unparticipate-form').submit();
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
