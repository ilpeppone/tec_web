@extends('layouts.main')

@section('title', 'Eventi in Attesa - Torbit')

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
    <div class="row">
    @foreach($pendingEvents as $event)  
        <div class="col-md-4 mb-4" id="event-card-{{ $event->id }}">
            <div class="admin_card h-100 d-flex flex-column">
                <div class="admin_card_image" style="background-image: url('{{ asset('storage/' . $event->image_path) }}')"></div>
                <div class="admin_card_body flex-grow-1 d-flex flex-column">
                    <h5 class="admin_card_title">{{ $event->title }}</h5>
                    <p class="admin_card_description">
                    </p>
                    <div class="mt-auto">
                        <div class="mb-2 d-flex">
                            <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-custom-pri w-100"><i class="bi bi-eye"></i> Visualizza</a>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-success w-100" onclick="confirmApprove({{ $event->id }})"><i class="bi bi-check-square"></i> Approva</button>
                            <button type="button" class="btn btn-danger w-100" onclick="confirmDelete({{ $event->id }})"><i class="bi bi-trash3"></i> Elimina</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
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
            $.ajax({
                url: "/events/" + eventId + "/approve",
                type: "PATCH",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire('Approvato!', 'L\'evento è stato approvato con successo.', 'success');
                    $("#event-card-" + eventId).fadeOut();
                },
                error: function() {
                    Swal.fire('Errore!', 'Qualcosa è andato storto.', 'error');
                }
            });
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
            $.ajax({
                url: "/admin/events/" + eventId,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire('Eliminato!', 'L\'evento è stato eliminato con successo.', 'success');
                    $("#event-card-" + eventId).fadeOut();
                },
                error: function() {
                    Swal.fire('Errore!', 'Qualcosa è andato storto.', 'error');
                }
            });
        }
    });
}
</script>
@endsection