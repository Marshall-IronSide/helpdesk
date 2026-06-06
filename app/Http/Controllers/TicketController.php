<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Show all tickets
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    // Show the create form
    public function create()
    {
        return view('tickets.create');
    }

    // Save a new ticket
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|min:3',
            'description' => 'required|min:10',
            'email'       => 'required|email',
            'priority'    => 'required|in:low,medium,high',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket submitted successfully!');
    }

    // Show one ticket
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    // Mark ticket as resolved
    public function resolve(Ticket $ticket)
    {
        $ticket->update(['status' => 'resolved']);
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket marked as resolved.');
    }
}
