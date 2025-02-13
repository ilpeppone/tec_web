@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Eventi in attesa di approvazione</h1>
    @foreach($pendingEvents as $event)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Visualizza</a>
                <form action="{{ route('admin.approve', $event->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Approva</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection