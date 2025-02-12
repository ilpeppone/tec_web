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

        // codice amministratore sia 'SECRET_ADMIN_CODE'
        if ($request->admin_code === 'SECRET_ADMIN_CODE') {
            $user = Auth::user();
            $user->role = 'admin';
            $user->save();

            return redirect()->route('home')->with('success', 'You have been promoted to admin.');
        }

        return redirect()->route('admin.promote.form')->with('error', 'Invalid admin code.');
    }
}
