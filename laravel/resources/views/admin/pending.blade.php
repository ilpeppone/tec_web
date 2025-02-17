@extends('layouts.main')

@section('content')
<div class="container text-center">
    @if($pendingEvents->isEmpty())
        <h1 style="padding-top:200px">Non ci sono eventi in attesa di approvazione</h1>
    @else
    <h1>Eventi in attesa di approvazione</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif   
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    @foreach($pendingEvents as $event)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-primary">Visualizza</a>
                <form action="{{ route('events.approve', $event->id) }}" method="POST" class="d-inline" id="approve-form-{{ $event->id }}">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-success" onclick="confirmApprove({{ $event->id }})">Approva</button>
                </form>
                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline" id="delete-form-{{ $event->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $event->id }})">Elimina</button>
                </form>
            </div>
        </div>
    @endforeach
    @endif
</div>

<script>
    function confirmApprove(eventId) {
        Swal.fire({
            title: 'Sei sicuro di voler approvare questo evento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sì, approva!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('approve-form-' + eventId).submit();
            }
        });
    }

    function confirmDelete(eventId) {
        Swal.fire({
            title: 'Sei sicuro di voler cancellare questo evento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sì, cancella!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + eventId).submit();
            }
        });
    }
</script>
@endsection