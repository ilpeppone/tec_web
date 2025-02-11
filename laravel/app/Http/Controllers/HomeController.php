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
        $this->middleware('auth');
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
}
