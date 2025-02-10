@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <label for="is_outdoor">Is Outdoor</label>
            <input type="checkbox" name="is_outdoor" id="is_outdoor">
        </div>
        <div>
            <label for="event_date">Event Date</label>
            <input type="datetime-local" name="event_date" id="event_date" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
