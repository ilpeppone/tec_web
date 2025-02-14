<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Recupera gli eventi con più iscritti, ordinati per numero di partecipanti in ordine decrescente
        $featuredEvents = Event::withCount('participants')
            ->where('approved', true)
            ->orderBy('participants_count', 'desc')
            ->take(3) // Limita a 3 eventi in evidenza
            ->get();

        return view('welcome', compact('featuredEvents'));
    }

    public function benvenuto()
    {
    $user = Auth::user(); 
    return view('home', ['user' => $user]);
    }

    public function home()
    {
        $user = Auth::user();

        // Eventi creati dall'utente
        $createdEvents = Event::where('user_id', $user->id)->get();

        // Eventi a cui l'utente è iscritto
        $subscribedEvents = $user->events;

        return view('home', compact('user', 'createdEvents', 'subscribedEvents'));
    }
}
