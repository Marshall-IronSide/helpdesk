@extends('layouts.app')

@section('content')

{{-- Stats Row --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(79,142,247,0.12);">🎫</div>
        <div>
            <div class="label">Total des tickets</div>
            <div class="value" style="color:var(--accent);">{{ $tickets->count() }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(34,197,94,0.12);">✅</div>
        <div>
            <div class="label">Ouverts</div>
            <div class="value" style="color:var(--low);">{{ $tickets->where('status','open')->count() }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(107,114,128,0.12);">🔒</div>
        <div>
            <div class="label">Résolus</div>
            <div class="value" style="color:var(--muted);">{{ $tickets->where('status','resolved')->count() }}</div>
        </div>
    </div>
</div>

{{-- Header --}}
<div class="page-header">
    <div>
        <div class="page-title">Tous les tickets</div>
        <div class="page-subtitle">{{ $tickets->count() }} ticket(s) dans le système</div>
    </div>
</div>

{{-- Ticket List --}}
@if($tickets->isEmpty())
    <div class="empty-state">
        <div class="icon">📭</div>
        <h3>Aucun ticket pour le moment</h3>
        <p>Lorsque les utilisateurs soumettent des demandes d'assistance, elles apparaîtront ici.</p>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">Soumettre le premier ticket</a>
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
                    <span class="badge badge-{{ $ticket->priority }}">{{ 
                        $ticket->priority === 'low' ? 'Basse' : 
                        ($ticket->priority === 'medium' ? 'Moyenne' : 
                        ($ticket->priority === 'high' ? 'Haute' : $ticket->priority))
                    }}</span>
                    <span class="badge badge-{{ $ticket->status }}">{{ 
                        $ticket->status === 'open' ? 'Ouvert' : 
                        ($ticket->status === 'resolved' ? 'Résolu' : $ticket->status)
                    }}</span>
                </div>
            </a>
        @endforeach
    </div>
@endif

@endsection