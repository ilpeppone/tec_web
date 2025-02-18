<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class DeletePastEvents extends Command
{
    protected $signature = 'events:delete-past';
    protected $description = 'Elimina tutti gli eventi la cui data è stata superata';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::today();
        $events = Event::where('event_date', '<', $today)->get();

        foreach ($events as $event) {
            $event->delete();
            $this->info('Evento eliminato: ' . $event->title);
        }

        $this->info('Tutti gli eventi passati sono stati eliminati con successo.');
    }
}
