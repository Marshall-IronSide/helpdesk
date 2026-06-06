@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <div class="page-title">Ticket #{{ $ticket->id }}</div>
        <div class="page-subtitle">Submitted {{ $ticket->created_at->diffForHumans() }}</div>
    </div>
    <a href="{{ route('tickets.index') }}" class="btn btn-secondary">← All Tickets</a>
</div>

<div class="detail-card">

    {{-- Header --}}
    <div class="detail-header">
        <div class="detail-title">{{ $ticket->title }}</div>
        <div style="display:flex; gap:0.5rem; flex-shrink:0;">
            <span class="badge badge-{{ $ticket->priority }}">{{ $ticket->priority }}</span>
            <span class="badge badge-{{ $ticket->status }}">{{ $ticket->status }}</span>
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
                <div class="meta-label">Submitted by</div>
                <div class="meta-value">{{ $ticket->email }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Created at</div>
                <div class="meta-value">{{ $ticket->created_at->format('d M Y, H:i') }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Priority</div>
                <div class="meta-value">
                    <span class="badge badge-{{ $ticket->priority }}">{{ ucfirst($ticket->priority) }}</span>
                </div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Status</div>
                <div class="meta-value">
                    <span class="badge badge-{{ $ticket->status }}">{{ ucfirst($ticket->status) }}</span>
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
                ✅ Mark as Resolved
            </button>
        </form>
    </div>
    @else
    <div class="detail-footer" style="color:var(--muted); font-size:0.875rem;">
        ✓ This ticket was resolved on {{ $ticket->updated_at->format('d M Y, H:i') }}
    </div>
    @endif

</div>

@endsection