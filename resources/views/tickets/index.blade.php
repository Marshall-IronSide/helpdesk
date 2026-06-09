@extends('layouts.app')

@section('content')
    <div class="stats-grid">
        <a href="{{ route('tickets.index') }}" class="stat-card">
            <div class="stat-icon" style="background:rgba(79,142,247,0.12);">🎫</div>
            <div>
                <div class="label">Total des tickets</div>
                <div class="value" style="color:var(--accent);">{{ $tickets->count() }}</div>
            </div>
        </a>
        <a href="{{ route('tickets.filtered', 'open') }}" class="stat-card">
            <div class="stat-icon" style="background:rgba(34,197,94,0.12);">✅</div>
            <div>
                <div class="label">Ouverts</div>
                <div class="value" style="color:var(--low);">{{ $tickets->where('status', 'open')->count() }}</div>
            </div>
        </a>
        <a href="{{ route('tickets.filtered', 'resolved') }}" class="stat-card">
            <div class="stat-icon" style="background:rgba(107,114,128,0.12);">🔒</div>
            <div>
                <div class="label">Résolus</div>
                <div class="value" style="color:var(--muted);">{{ $tickets->where('status', 'resolved')->count() }}</div>
            </div>
        </a>
    </div>

    <div class="page-header">
        <div>
            <div class="page-title">
                {{ Auth::user()->isAdmin() ? 'Tous les tickets' : 'Mes tickets' }}
            </div>
            <div class="page-subtitle">{{ $tickets->count() }} ticket(s)</div>
        </div>
    </div>

    @if ($tickets->isEmpty())
        <div class="empty-state">
            <div class="icon">📭</div>
            <h3>Aucun ticket pour le moment</h3>
            <p>Soumettez votre première demande d'assistance.</p>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">Soumettre un ticket</a>
        </div>
    @else
        <div class="tickets-list">
            @foreach ($tickets as $ticket)
                <a href="{{ route('tickets.show', $ticket) }}" class="ticket-card {{ $ticket->priority }}">
                    <div>
                        <div class="ticket-title">{{ $ticket->title }}</div>
                        <div class="ticket-meta">
                            <span>✉️ {{ $ticket->email }}</span>
                            <span>💬 {{ $ticket->comments_count ?? $ticket->comments->count() }} commentaire(s)</span>
                            <span>🕐 {{ $ticket->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="ticket-actions">
                        <span class="badge badge-{{ $ticket->priority }}">{{ \App\Helpers\TicketHelper::translatePriority($ticket->priority) }}</span>
                        <span class="badge badge-{{ $ticket->status }}">{{ \App\Helpers\TicketHelper::translateStatus($ticket->status) }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
@endsection
