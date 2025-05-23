<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        // verifica se l'utente è loggato e ha il permesso di amministratore
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // se non è un amministratore, redirige con un messaggio di errore
        return redirect('/home')->with('error', 'Accesso negato.');
    }
}
