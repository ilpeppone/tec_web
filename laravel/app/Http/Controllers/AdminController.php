<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

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

        // codice per l'admin
        if ($request->admin_code === 'SECRET_ADMIN_CODE') {
            $user = Auth::user();
            $user->role = 'admin';
            $user->save();

            return redirect()->route('home')->with('success', 'Sei diventato un amministratore.');
        }

        return back()->with('error', 'Codice admin non valido.');
    }

    public function adminShow($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.admin_show', compact('event'));
    }
    
    public function pending()
    {
        $pendingEvents = Event::where('approved', false)->get();
        return view('admin.pending', compact('pendingEvents'));
    }

    public function approve($id)
    {
        $event = Event::findOrFail($id);
        $event->approved = true;
        $event->save();

        return response()->json(['success' => 'Evento approvato con successo']);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['success' => 'Evento eliminato con successo']);
    }

    public function approveform($id)
    {
        $event = Event::findOrFail($id);
        $event->approved = true;
        $event->save();

        return redirect()->route('admin.pending')->with('success', 'Evento Approvato con successo.');
    }

    public function destroyform($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.pending')->with('warning', 'Evento Eliminato');
    }

}

