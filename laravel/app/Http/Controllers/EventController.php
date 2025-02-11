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
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        Log::info('Request data: ', $request->all());

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'required|date',
            'max_participants' => 'required|integer|min:1',
            'address' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
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
        ]);

        Log::info('Event created successfully.');

        return redirect()->route('events.index');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
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
        return redirect()->route('events.show', $event->id)->with('success', 'Sei stato rimosso dall\'evento.');
    }
}
