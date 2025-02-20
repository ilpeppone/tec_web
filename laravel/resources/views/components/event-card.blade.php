<div class="col-md-3 mb-4">
    <div class="card" style="background-image: url('{{ asset('storage/' . $event->image_path) }}')">
        <div class="content">
            <h2 class="title">{{ $event->title }}</h2>
            <p class="copy">
                <i class="fa fa-calendar"></i> {{ $event->event_date}}<br>
                <i class="fa fa-users"></i> Partecipanti: {{ $event->participants_count }}
            </p>
            @if(!empty($event->description))
                <p class="description">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
            @endif
            <button class="btn btn-custom-pri" onclick="window.location.href='{{ route('events.show', $event->id) }}'">Scopri di più</button>
        </div>
    </div>
</div>
