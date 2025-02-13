<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se l'utente è loggato e ha il permesso di amministratore
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Se non è un amministratore, redirige con un messaggio di errore
        return redirect('/home')->with('error', 'Accesso negato.');
    }
}
