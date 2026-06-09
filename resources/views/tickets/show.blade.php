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
        <div class="detail-header">
            <div class="detail-title">{{ $ticket->title }}</div>
            <div style="display:flex;gap:.5rem;flex-shrink:0;">
                <span class="badge badge-{{ $ticket->priority }}">{{ \App\Helpers\TicketHelper::translatePriority($ticket->priority) }}</span>
                <span class="badge badge-{{ $ticket->status }}">{{ \App\Helpers\TicketHelper::translateStatus($ticket->status) }}</span>
            </div>
        </div>

        <div class="detail-body">
            <div class="detail-description">{{ $ticket->description }}</div>
            <div class="meta-grid">
                <div>
                    <div class="meta-label">Soumis par</div>
                    <div class="meta-value">{{ $ticket->email }}</div>
                </div>
                <div>
                    <div class="meta-label">Créé le</div>
                    <div class="meta-value">{{ $ticket->created_at->format('d M Y, H:i') }}</div>
                </div>
                <div>
                    <div class="meta-label">Priorité</div>
                    <div class="meta-value"><span
                            class="badge badge-{{ $ticket->priority }}">{{ \App\Helpers\TicketHelper::translatePriority($ticket->priority) }}</span></div>
                </div>
                <div>
                    <div class="meta-label">Statut</div>
                    <div class="meta-value"><span
                            class="badge badge-{{ $ticket->status }}">{{ \App\Helpers\TicketHelper::translateStatus($ticket->status) }}</span></div>
                </div>
            </div>
        </div>

        <div class="detail-footer">
            @if ($ticket->status === 'open')
                @if (Auth::id() === $ticket->user_id)
                    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-secondary btn-sm">✏️ Modifier</a>
                @endif
                @if (Auth::user()->isAdmin())
                    <form action="{{ route('tickets.resolve', $ticket) }}" method="POST" style="margin:0;">
                        @csrf @method('PATCH')
                        <button class="btn btn-success btn-sm">✅ Marquer comme résolu</button>
                    </form>
                @endif
            @else
                <span style="color:var(--muted);font-size:.875rem;">✓ Résolu le
                    {{ $ticket->updated_at->format('d M Y, H:i') }}</span>
            @endif

            @if (Auth::user()->isAdmin())
                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST"
                    onsubmit="return confirm('Supprimer ce ticket ?')" style="margin:0;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">🗑️ Supprimer</button>
                </form>
            @endif
        </div>
    </div>

    {{-- SECTION COMMENTAIRES --}}
    <div class="comments-section">
        <div class="comments-title">
            💬 Commentaires
            <span class="count">{{ $ticket->comments->count() }}</span>
        </div>

        @if ($ticket->comments->isEmpty())
            <p style="color:var(--muted);font-size:.875rem;margin-bottom:1.25rem;">Aucun commentaire pour le moment. Soyez
                le premier !</p>
        @else
            <div class="comment-list">
                @foreach ($ticket->comments as $comment)
                    <div class="comment-item">
                        <div class="comment-header">
                            <div style="display:flex;align-items:center;gap:.75rem;">
                                <span class="comment-author">{{ $comment->user->name }}</span>
                                @if ($comment->user->isAdmin())
                                    <span class="badge-admin">ADMIN</span>
                                @endif
                                <span class="comment-date">{{ $comment->created_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            @if (Auth::id() === $comment->user_id || Auth::user()->isAdmin())
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                    onsubmit="return confirm('Supprimer ce commentaire ?')" style="margin:0;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        style="padding:.2rem .6rem;font-size:.72rem;">✕</button>
                                </form>
                            @endif
                        </div>
                        <div class="comment-content">{{ $comment->content }}</div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Formulaire ajout commentaire --}}
        <div class="comment-form">
            <form action="{{ route('comments.store', $ticket) }}" method="POST">
                @csrf
                <textarea name="content" placeholder="Ajouter un commentaire..." required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback" style="color:var(--high);font-size:.78rem;margin-top:.3rem;">
                        {{ $message }}</div>
                @enderror
                <div class="comment-form-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Envoyer 💬</button>
                </div>
            </form>
        </div>
    </div>
@endsection
