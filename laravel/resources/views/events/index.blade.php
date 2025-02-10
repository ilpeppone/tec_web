@extends('layouts.app')

@section('content')
    <h1>Events</h1>
    <a href="{{ route('events.create') }}">Create Event</a>
    <ul>
        @foreach ($events as $event)
            <li>{{ $event->title }}</li>
        @endforeach
    </ul>
@endsection
