@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Modifier le Ticket #{{ $ticket->id }}</div>
        <div class="page-subtitle">Seul le titre, la description et la priorité sont modifiables</div>
    </div>
    <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-secondary">← Retour</a>
</div>

<div class="form-card">
    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Titre</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $ticket->title) }}">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $ticket->description) }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Priorité</label>
            <select name="priority" class="form-control">
                <option value="low"    {{ old('priority', $ticket->priority) === 'low'    ? 'selected' : '' }}>🟢 Low — Pas urgent</option>
                <option value="medium" {{ old('priority', $ticket->priority) === 'medium' ? 'selected' : '' }}>🟡 Medium — Nécessite attention</option>
                <option value="high"   {{ old('priority', $ticket->priority) === 'high'   ? 'selected' : '' }}>🔴 High — Urgent</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection