<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Invia email o salva i dati nel database
        // Mail::to('info@esempio.com')->send(new ContactMail($request->all()));

        return redirect()->route('contact')->with('success', 'Messaggio inviato con successo!');
    }
}