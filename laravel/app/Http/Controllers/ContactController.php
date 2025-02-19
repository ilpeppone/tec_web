<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'userMessage' => $request->input('message'),
        ];

        Mail::send('mail.contact', $data, function ($message) use ($data) {
            $message->to('pepperusso07@gmail.com')
                    ->subject('Nuovo Messaggio dal Form di Contatto')
                    ->from($data['email']);
        });

        return back()->with('success', 'Email inviata con successo!');
    }
}
