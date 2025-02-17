<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        // Invia l'email di benvenuto
        Mail::to($email)->send(new HelloMail());

        return redirect()->back()->with('success', 'Iscrizione avvenuta con successo!');
    }
}
