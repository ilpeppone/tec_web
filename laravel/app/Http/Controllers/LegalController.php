<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Mostra la pagina della Privacy Policy.
     *
     * @return \Illuminate\View\View
     */
    public function privacy()
    {
        return view('privacy'); 
    }

    /**
     * Mostra la pagina dei Termini di Servizio.
     *
     * @return \Illuminate\View\View
     */
    public function terms()
    {
        return view('terms'); 
    }
}
