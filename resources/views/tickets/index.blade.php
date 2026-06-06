@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tous les tickets</h2>

    @if ($tickets->isEmpty())
        <p class="text-muted">Aucun ticket pour le moment. <a href="{{ route('tickets.create') }}">Soumettre un!</a></p>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>E-mail</th>
                    <th>Priorité</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td><a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->title }}</a></td>
                        <td>{{ $ticket->email }}</td>
                        <td>
                            <span
                                class="badge 
                        {{ $ticket->priority === 'high'
                            ? 'bg-danger'
                            : ($ticket->priority === 'medium'
                                ? 'bg-warning text-dark'
                                : 'bg-secondary') }}">
                                {{ ucfirst($ticket->priority) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $ticket->status === 'open' ? 'bg-success' : 'bg-dark' }}">
                                {{ ucfirst($ticket->status) }}
                            </span>
                        </td>
                        <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                        <td><a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
