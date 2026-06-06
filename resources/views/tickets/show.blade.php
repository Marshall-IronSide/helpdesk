@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Ticket #{{ $ticket->id }}</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $ticket->title }}</h4>
            <p class="text-muted">Soumis par {{ $ticket->email }} le {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
            <hr>
            <p>{{ $ticket->description }}</p>
            <p>
                <strong>Priorité :</strong>
                <span
                    class="badge {{ $ticket->priority === 'high' ? 'bg-danger' : ($ticket->priority === 'medium' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                    {{ ucfirst($ticket->priority) }}
                </span>
            </p>
            <p>
                <strong>Statut :</strong>
                <span class="badge {{ $ticket->status === 'open' ? 'bg-success' : 'bg-dark' }}">
                    {{ ucfirst($ticket->status) }}
                </span>
            </p>
        </div>

        @if ($ticket->status === 'open')
            <div class="card-footer">
                <form action="{{ route('tickets.resolve', $ticket) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-dark">✅ Mark as Resolved</button>
                </form>
            </div>
        @endif
    </div>

    <a href="{{ route('tickets.index') }}" class="btn btn-secondary mt-3">← Back to list</a>
@endsection
