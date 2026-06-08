<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Mini HelpDesk</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: #0d0f14; color: #e8eaf0; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { background: #161921; border: 1px solid #2a2f42; border-radius: 16px; padding: 2.5rem; width: 100%; max-width: 420px; }
        .brand { font-family: 'Syne', sans-serif; font-size: 1.4rem; font-weight: 800; color: #4f8ef7; text-align: center; margin-bottom: 0.25rem; }
        .subtitle { text-align: center; color: #6b7280; font-size: 0.875rem; margin-bottom: 2rem; }
        .form-group { margin-bottom: 1.1rem; }
        .form-label { display: block; font-size: 0.78rem; font-weight: 500; color: #6b7280; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 0.4rem; }
        .form-control { width: 100%; background: #0d0f14; border: 1px solid #2a2f42; border-radius: 8px; padding: 0.7rem 1rem; color: #e8eaf0; font-family: 'DM Sans', sans-serif; font-size: 0.9rem; outline: none; transition: border-color 0.18s; }
        .form-control:focus { border-color: #4f8ef7; box-shadow: 0 0 0 3px rgba(79,142,247,0.15); }
        .invalid-feedback { font-size: 0.78rem; color: #ef4444; margin-top: 0.3rem; }
        .btn { width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-family: 'DM Sans', sans-serif; font-size: 0.95rem; font-weight: 500; cursor: pointer; margin-top: 0.5rem; }
        .btn-primary { background: #4f8ef7; color: #fff; transition: background 0.18s; }
        .btn-primary:hover { background: #3a7de8; }
        .footer-link { text-align: center; margin-top: 1.5rem; font-size: 0.85rem; color: #6b7280; }
        .footer-link a { color: #4f8ef7; text-decoration: none; }
        .alert-error { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #f87171; border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.85rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
<div class="card">
    <div class="brand">🎫 Mini HelpDesk</div>
    <div class="subtitle">Connectez-vous pour accéder au support</div>

    @if($errors->any())
        <div class="alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="vous@exemple.com" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter →</button>
    </form>

    <div class="footer-link">
        Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
    </div>
</div>
</body>
</html>