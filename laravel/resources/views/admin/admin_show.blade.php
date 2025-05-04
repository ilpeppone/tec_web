@extends('layouts.main')

@section('title', 'Approvazione - Torbit')

@section('breadcrumbs')
    {{ Breadcrumbs::render('events.show', $event) }}
@endsection

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <div class="container" style="position: relative; z-index: 1; background-color: #6d6d6d; border-radius: 10px; padding: 20px;">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif  

        <div class="row align-items-center">
            <div class="col-md-7 d-flex flex-column">
                <h1 class="mb-3">{{ $event->title }}</h1>
                <p>{{ $event->description }}</p> 
                <p><strong>Data:</strong> {{ $event->event_date }}</p>
                <p><strong>Partecipanti:</strong> {{ $event->max_participants }}</p>
                <p><strong>Indirizzo:</strong> {{ $event->address }}</p>
                <p><strong>Luogo:</strong> {{ $event->is_outdoor ? 'All\'aperto' : 'Al chiuso' }}</p>
                <p><strong>Prezzo:</strong> {{ $event->price }}</p>
            </div>

            <div class="col-md-5">
                <div class="rounded shadow-lg" style="
                    width: 100%;
                    height: 300px;
                    background-image: url('{{ asset($event->image_path ? $event->image_path : 'images/events/default.jpg') }}');
                    background-size: cover;
                    background-position: center;">
                </div>
            </div>
        </div>

        <div class="row mt-4 text-center">
            <div class="col-md-6">
                <form action="{{ route('admin.approveform', $event->id) }}" method="POST" id="approve-form">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-success w-100 py-2" onclick="confirmApprove()"><i class="bi bi-check-square"></i> Approva</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('admin.events.destroyform', $event->id) }}" method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger w-100 py-2" onclick="confirmDelete()"><i class="bi bi-trash3"></i> Elimina</button>
                </form>
            </div>
            <div class="col-md-12 mt-3">
                <a href="{{ route('admin.pending') }}" class="btn btn-custom-pri w-50 py-2"><i class="bi bi-arrow-left-square"></i> Torna Indietro</a>
            </div>
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
