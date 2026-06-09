<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|min:3',
            'description' => 'required|min:10',
            'priority'    => 'required|in:low,medium,high',
        ]);

        Ticket::create([
            'title'       => $request->title,
            'description' => $request->description,
            'priority'    => $request->priority,
            'status'      => 'open',
            'email'       => Auth::user()->email,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('tickets.index')
                         ->with('success', 'Ticket soumis avec succès !');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        // Seul le propriétaire peut modifier
        if (Auth::id() !== $ticket->user_id) {
            abort(403, 'Action non autorisée.');
        }
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        if (Auth::id() !== $ticket->user_id) {
            abort(403, 'Action non autorisée.');
        }

        $request->validate([
            'title'       => 'required|min:3',
            'description' => 'required|min:10',
            'priority'    => 'required|in:low,medium,high',
        ]);

        $ticket->update([
            'title'       => $request->title,
            'description' => $request->description,
            'priority'    => $request->priority,
        ]);

        return redirect()->route('tickets.show', $ticket)
                         ->with('success', 'Ticket modifié avec succès !');
    }

    public function resolve(Ticket $ticket)
    {
        // Seul l'admin peut résoudre
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Action réservée à l\'administrateur.');
        }

        $ticket->update(['status' => 'resolved']);
        return redirect()->route('tickets.index')
                         ->with('success', 'Ticket marqué comme résolu.');
    }

    public function destroy(Ticket $ticket)
{
    if (!Auth::user()->isAdmin()) {
        abort(403, 'Action réservée à l\'administrateur.');
    }

    $ticket->delete();

    return redirect()->route('tickets.index')
                     ->with('success', 'Ticket supprimé avec succès.');
}
}