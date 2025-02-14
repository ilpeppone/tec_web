<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showPromoteForm()
    {
        return view('admin.promote');
    }

    public function promote(Request $request)
    {
        $request->validate([
            'admin_code' => 'required|string',
        ]);

        // Verifica il codice admin (puoi sostituire 'your_admin_code' con il codice reale)
        if ($request->admin_code === 'SECRET_ADMIN_CODE') {
            $user = Auth::user();
            $user->role = 'admin';
            $user->save();

            return redirect()->route('home')->with('success', 'Sei diventato un amministratore.');
        }

        return redirect()->route('home')->with('error', 'Codice admin non valido.');
    }
}
