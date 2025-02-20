@extends('layouts.main')

@section('title', $event->title . ' - E-vents')

@section('breadcrumbs')
    {{ Breadcrumbs::render('events.show', $event) }}
@endsection

@section('content')
<section class="hero-section py-5">
    <div class="container" style="position: relative; z-index: 1; background-color:#6d6d6d50; border-radius: 15px; padding: 40px; margin-bottom: 30px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif  
        @if (session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <div class="row align-items-center">
            <!-- Dettagli evento a sinistra -->
            <div class="col-md-7 d-flex flex-column">
                <h1 class="mb-3">{{ $event->title }}</h1>
                <p>{{ $event->description }}</p>
                <p><strong>Data:</strong> {{ $event->event_date }}</p>
                <p><strong>Indirizzo:</strong> {{ $event->address }}</p>
                <p><strong>Luogo:</strong> {{ $event->is_outdoor ? 'All\'aperto' : 'Al chiuso' }}</p>
                <p><strong>Partecipanti:</strong> {{ $event->participants()->count() }} / {{ $event->max_participants }}</p>
                <p><strong>Prezzo:</strong> €{{ $event->price }}</p>
            </div>

            <div class="col-md-5">
                <div class="rounded shadow-lg" style="
                    width: 100%;
                    height: 300px;
                    background-image: url('{{ asset($event->image_path ? 'storage/' . $event->image_path : 'images/ferrara.png') }}');
                    background-size: cover;
                    background-position: center;">
                </div>
            </div>
        </div>

        @if (Auth::check())
        <div class="row mt-4 text-center">
            <div class="col-md-6">
                @if ($event->participants->contains(Auth::user()))
                    <form action="{{ route('events.unparticipate', $event->id) }}" method="POST" id="unparticipate-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-warning w-100 py-2" onclick="confirmUnparticipate()"><i class="bi bi-x-square"></i> Disiscriviti</button>
                    </form>
                @elseif ($event->participants()->count() < $event->max_participants)
                    <form action="{{ route('events.participate', $event->id) }}" method="POST" id="participate-form">
                        @csrf
                        <button type="button" class="btn btn-success w-100 py-2" onclick="confirmParticipate()"><i class="bi bi-check-square"></i> Partecipa</button>
                    </form>
                @else
                    <button class="btn btn-secondary w-100 py-2" disabled><i class="bi bi-slash-circle-fill"></i> Posti esauriti</button>
                @endif
            </div>

            @if(auth()->user()->id === $event->user_id || Auth::user()->role === 'admin')
                <div class="col-md-6">
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" id="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger w-100 py-2" onclick="confirmDelete()"><i class="bi bi-trash3"></i> Elimina</button>
                    </form>
                </div>
            @endif
        </div>
        @endif
        <div class="col-md-12 mt-3 text-center">
            <a href="{{ route('events.index') }}" class="btn btn-secondary w-50 py-2"><i class="bi bi-arrow-left-square"></i> Altri Eventi</a>
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
