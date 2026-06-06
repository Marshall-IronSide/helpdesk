@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <div class="page-title">New Ticket</div>
        <div class="page-subtitle">Describe your issue and we'll get back to you</div>
    </div>
    <a href="{{ route('tickets.index') }}" class="btn btn-secondary">← Back</a>
</div>

<div class="form-card">
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Your Email</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="you@example.com"
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Title</label>
            <input
                type="text"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                placeholder="Short summary of your issue"
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
                placeholder="Describe your issue in detail..."
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Priority</label>
            <select name="priority" class="form-control">
                <option value="low"    {{ old('priority') === 'low'    ? 'selected' : '' }}>🟢 Low — Not urgent</option>
                <option value="medium" {{ old('priority','medium') === 'medium' ? 'selected' : '' }}>🟡 Medium — Needs attention</option>
                <option value="high"   {{ old('priority') === 'high'   ? 'selected' : '' }}>🔴 High — Urgent issue</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Submit Ticket →</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection