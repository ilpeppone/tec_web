@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Eventi in attesa di approvazione</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @foreach($pendingEvents as $event)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-primary">Visualizza</a>
                <form action="{{ route('events.approve', $event->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Approva</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection