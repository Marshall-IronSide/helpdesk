@extends('layouts.app')

@section('content')

{{-- Stats Row --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(79,142,247,0.12);">🎫</div>
        <div>
            <div class="label">Total Tickets</div>
            <div class="value" style="color:var(--accent);">{{ $tickets->count() }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(34,197,94,0.12);">✅</div>
        <div>
            <div class="label">Open</div>
            <div class="value" style="color:var(--low);">{{ $tickets->where('status','open')->count() }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(107,114,128,0.12);">🔒</div>
        <div>
            <div class="label">Resolved</div>
            <div class="value" style="color:var(--muted);">{{ $tickets->where('status','resolved')->count() }}</div>
        </div>
    </div>
</div>

{{-- Header --}}
<div class="page-header">
    <div>
        <div class="page-title">All Tickets</div>
        <div class="page-subtitle">{{ $tickets->count() }} ticket(s) in the system</div>
    </div>
</div>

{{-- Ticket List --}}
@if($tickets->isEmpty())
    <div class="empty-state">
        <div class="icon">📭</div>
        <h3>No tickets yet</h3>
        <p>When users submit support requests, they'll appear here.</p>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">Submit first ticket</a>
    </div>
@else
    <div class="tickets-list">
        @foreach($tickets as $ticket)
            <a href="{{ route('tickets.show', $ticket) }}" class="ticket-card {{ $ticket->priority }}">
                <div>
                    <div class="ticket-title">{{ $ticket->title }}</div>
                    <div class="ticket-meta">
                        <span>✉️ {{ $ticket->email }}</span>
                        <span>🕐 {{ $ticket->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="ticket-actions">
                    <span class="badge badge-{{ $ticket->priority }}">{{ $ticket->priority }}</span>
                    <span class="badge badge-{{ $ticket->status }}">{{ $ticket->status }}</span>
                </div>
            </a>
        @endforeach
    </div>
@endif

@endsection