<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventCarousel extends Component
{
    public $events;
    public $carouselId;
    public $title;

    public function __construct($events, $carouselId, $title)
    {
        $this->events = $events;
        $this->carouselId = $carouselId;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.event-carousel');
    }
}
