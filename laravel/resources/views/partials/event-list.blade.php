<div class="row">
    @foreach ($events as $event)
        <x-event-card :event="$event" />
    @endforeach
</div>