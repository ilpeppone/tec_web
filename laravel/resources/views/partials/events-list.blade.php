<div class="row">
    @forelse ($events as $event)
        <x-event-card :event="$event" />
    @empty
        <p class="text-center text-white">Nessun evento trovato.</p>
    @endforelse
</div>
