@php
    $chunkSize = isset($_COOKIE['is_mobile']) && $_COOKIE['is_mobile'] == "1" ? 1 : 3; // Se mobile, 1 evento per chunk, altrimenti 3
@endphp

<h2 class="mb-4">{{ $title }}</h2>
<div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($events->chunk($chunkSize) as $chunk)
            <div class="carousel-item @if ($loop->first) active @endif">
                <div class="row justify-content-center">
                    @foreach ($chunk as $event)
                        <x-event-card :event="$event" />
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    <div class="carousel-indicators">
        @foreach ($events->chunk($chunkSize) as $index => $chunk)
            <button type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
</div>
