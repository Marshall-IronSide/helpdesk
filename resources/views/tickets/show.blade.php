@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <div class="page-title">Ticket #{{ $ticket->id }}</div>
        <div class="page-subtitle">Soumis {{ $ticket->created_at->diffForHumans() }}</div>
    </div>
    <a href="{{ route('tickets.index') }}" class="btn btn-secondary">← Tous les tickets</a>
</div>

<div class="detail-card">

    {{-- Header --}}
    <div class="detail-header">
        <div class="detail-title">{{ $ticket->title }}</div>
        <div style="display:flex; gap:0.5rem; flex-shrink:0;">
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
    </div>

    {{-- Body --}}
    <div class="detail-body">

        {{-- Description --}}
        <div class="detail-description">
            {{ $ticket->description }}
        </div>

        {{-- Meta --}}
        <div class="meta-grid">
            <div class="meta-item">
                <div class="meta-label">Soumis par</div>
                <div class="meta-value">{{ $ticket->email }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Créé le</div>
                <div class="meta-value">{{ \App\Helpers\DateHelper::formatFrench($ticket->created_at, 'd F Y, H:i') }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Priorité</div>
                <div class="meta-value">
                    <span class="badge badge-{{ $ticket->priority }}">{{ 
                        $ticket->priority === 'low' ? 'Basse' : 
                        ($ticket->priority === 'medium' ? 'Moyenne' : 
                        ($ticket->priority === 'high' ? 'Haute' : $ticket->priority))
                    }}</span>
                </div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Statut</div>
                <div class="meta-value">
                    <span class="badge badge-{{ $ticket->status }}">{{ 
                        $ticket->status === 'open' ? 'Ouvert' : 
                        ($ticket->status === 'resolved' ? 'Résolu' : $ticket->status)
                    }}</span>
                </div>
            </div>
        </div>

    </div>

    {{-- Footer: resolve button --}}
    @if($ticket->status === 'open')
    <div class="detail-footer">
        <form action="{{ route('tickets.resolve', $ticket) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">
                ✅ Marquer comme résolu
            </button>
        </form>
    </div>
    @else
    <div class="detail-footer" style="color:var(--muted); font-size:0.875rem;">
        ✓ Ce ticket a été résolu le {{ \App\Helpers\DateHelper::formatFrench($ticket->updated_at, 'd F Y, H:i') }}
    </div>
    @endif

</div>

@endsection