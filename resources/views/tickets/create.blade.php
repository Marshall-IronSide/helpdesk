@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <div class="page-title">new ticket</div>
        <div class="page-subtitle">Décrivez votre problème et nous vous répondrons</div>
    </div>
    <a href="{{ route('tickets.index') }}" class="btn btn-secondary">← Retour</a>
</div>

<div class="form-card">
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Votre email</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="vous@exemple.com"
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Titre</label>
            <input
                type="text"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                placeholder="Résumé court de votre problème"
                value="{{ old('title') }}"
            >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea
                name="description"
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Décrivez votre problème en détail..."
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Priorité</label>
            <select name="priority" class="form-control">
                <option value="low"    {{ old('priority') === 'low'    ? 'selected' : '' }}>🟢 Basse — Non urgent</option>
                <option value="medium" {{ old('priority','medium') === 'medium' ? 'selected' : '' }}>🟡 Moyenne — Nécessite attention</option>
                <option value="high"   {{ old('priority') === 'high'   ? 'selected' : '' }}>🔴 Haute — Problème urgent</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Soumettre le ticket →</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

@endsection