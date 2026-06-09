@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <div class="page-title">
                {{ $label === 'Ouverts' ? '🟢' : '🔒' }} Tickets {{ $label }}
            </div>
            <div class="page-subtitle">{{ $tickets->count() }} ticket(s) {{ strtolower($label) }}(s)</div>
        </div>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">← Retour</a>
    </div>

    @if ($tickets->isEmpty())
        <div class="empty-state">
            <div class="icon">{{ $label === 'Ouverts' ? '✅' : '🔒' }}</div>
            <h3>Aucun ticket {{ strtolower($label) }}</h3>
            <p>Il n'y a aucun ticket avec ce statut pour le moment.</p>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    @else
        <div class="tickets-list">
            @foreach ($tickets as $ticket)
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
