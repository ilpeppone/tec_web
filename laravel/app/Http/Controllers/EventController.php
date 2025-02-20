<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search', 'filter']);
    }

    public function index()
    {
        $mostSubscribedEvents = Event::withCount('participants')
            ->where('approved', true)
            ->orderBy('participants_count', 'desc')
            ->take(18)
            ->get();

        $recentEvents = Event::where('approved', true)
            ->orderBy('event_date', 'desc')
            ->take(18)
            ->get();

        $newlyCreatedEvents = Event::where('approved', true)
            ->orderBy('created_at', 'desc')
            ->take(18)
            ->get();

        $allEvents = Event::where('approved', true)->get();

        return view('events.index', compact('mostSubscribedEvents', 'recentEvents', 'newlyCreatedEvents', 'allEvents'));
    }

    public function filter(Request $request)
    {
        $query = Event::query();
    
        // Ricerca per titolo o descrizione
        if ($request->filled('searchQuery')) {
            $search = $request->searchQuery;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }
    
        // Ordinamento
        if ($request->filled('sortBy')) {
            switch ($request->sortBy) {
                case 'title':
                    $query->orderBy('title');
                    break;
                case 'date_asc':
                    $query->orderBy('event_date', 'asc');
                    break;
                case 'date_desc':
                    $query->orderBy('event_date', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }
    
        // Nascondere eventi pieni
        if ($request->maxParticipants == 'hide') {
            $query->whereRaw('max_participants IS NULL OR max_participants > (SELECT COUNT(*) FROM participants WHERE participants.event_id = events.id)');
        }
    
        $events = $query->get();
    
        return view('partials.events-list', compact('events'));
    }
    


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        Log::info('Request data: ', $request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'event_date' => 'required|date|after_or_equal:today',
            'is_outdoor' => 'required|boolean',
            'max_participants' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
            'price' => 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/',
        ]);

        // caricata un'immagine, salvala
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        } else {
        // immagine di default se nessuna immagine caricata
        $imagePath = 'events/default.jpg';
        }

        Event::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'is_outdoor' => $request->is_outdoor,
            'event_date' => $request->event_date,
            'max_participants' => $request->max_participants,
            'address' => $request->address,
            'approved' => false,
            'price' => $request->price,
        ]);

        Log::info('Event created successfully.');

        return redirect()->route('home')->with('success', 'Evento creato con successo! In attesa di approvazione.');
    }

    public function show($id)
    {
        $event = Event::where('id', $id)->where('approved', true)->firstOrFail();
        return view('events.show', compact('event'));
    }

    public function participate(Event $event)
    {
        if ($event->participants()->count() < $event->max_participants) {
            $event->participants()->attach(Auth::id());
            return redirect()->route('events.show', $event->id)->with('success', 'Sei stato aggiunto all\'evento.');
        } else {
            return redirect()->route('events.show', $event->id)->with('error', 'Numero massimo di partecipanti raggiunto.');
        }
    }

    public function unparticipate(Event $event)
    {
        $event->participants()->detach(Auth::id());
        return redirect()->route('events.show', $event->id)->with('warning', 'Sei stato rimosso dall\'evento.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // controlla se l'user autenticato è l'autore dell'evento
        if (auth()->user()->id !== $event->user_id) {
            return redirect()->route('events.index')->with('error', 'Unauthorized action.');
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = Event::query();

        $query->where('approved', true);

        if ($request->filled('query')) {
            $searchTerm = $request->input('query'); 
            $query->where(function($q) use ($searchTerm) {
                 $q->where('description', 'like', '%' . $searchTerm . '%')
                   ->orWhere('title', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('start_date') && $request->start_date) {
            $query->where('event_date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->where('event_date', '<=', $request->end_date);
        }

        if ($request->filled('location')) {
            if ($request->location == 'outdoor') {
                $query->where('is_outdoor', true);
            } elseif ($request->location == 'indoor') {
                $query->where('is_outdoor', false);
            }
        }

        if ($request->filled('price')) {
            if ($request->price == 0) {
                $query->where('price', 0);
            } elseif ($request->price > 0) {
                $query->where('price', '>', 0);
            }
        }

        $events = $query->get();

        return view('events.search_results', compact('events'));
    }
}
