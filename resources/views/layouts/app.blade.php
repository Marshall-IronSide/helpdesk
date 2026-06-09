<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} — Support</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg: #0d0f14;
            --surface: #161921;
            --surface2: #1e2230;
            --border: #2a2f42;
            --accent: #4f8ef7;
            --accent2: #7c3aed;
            --text: #e8eaf0;
            --muted: #6b7280;
            --low: #22c55e;
            --medium: #f59e0b;
            --high: #ef4444;
            --open: #4f8ef7;
            --resolved: #6b7280;
            --radius: 12px;
            --shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* NAV */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2.5rem;
            height: 64px;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-brand .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
            display: inline-block;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1)
            }

            50% {
                opacity: .5;
                transform: scale(1.3)
            }
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-user {
            color: var(--muted);
            font-size: 0.85rem;
        }

        .badge-admin {
            background: rgba(79, 142, 247, 0.15);
            color: var(--accent);
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 999px;
            margin-left: 0.3rem;
            font-weight: 600;
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.18s ease;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover {
            background: #3a7de8;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(79, 142, 247, .35);
        }

        .btn-secondary {
            background: var(--surface2);
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--border);
        }

        .btn-success {
            background: var(--low);
            color: #fff;
        }

        .btn-success:hover {
            background: #16a34a;
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.15);
            color: var(--high);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.25);
        }

        .btn-sm {
            padding: 0.35rem 0.9rem;
            font-size: 0.8rem;
        }

        /* LAYOUT */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem;
        }

        /* ALERTS */
        .alert {
            padding: 0.9rem 1.25rem;
            border-radius: var(--radius);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background: rgba(34, 197, 94, .12);
            border: 1px solid rgba(34, 197, 94, .3);
            color: #4ade80;
        }

        /* STATS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.2s;
            text-decoration: none;
            color: inherit;
        }

        .stat-card:hover {
            border-color: var(--accent);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .stat-card .label {
            font-size: 0.78rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .06em;
            font-weight: 500;
        }

        .stat-card .value {
            font-family: 'Syne', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            line-height: 1;
            margin-top: .15rem;
        }

        /* PAGE HEADER */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.75rem;
        }

        .page-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: .875rem;
            margin-top: .2rem;
        }

        /* TICKETS */
        .tickets-list {
            display: flex;
            flex-direction: column;
            gap: .75rem;
        }

        .ticket-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem 1.5rem;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: .75rem;
            align-items: center;
            text-decoration: none;
            color: inherit;
            transition: all .18s;
            position: relative;
            overflow: hidden;
        }

        .ticket-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            border-radius: 3px 0 0 3px;
        }

        .ticket-card.high::before {
            background: var(--high);
        }

        .ticket-card.medium::before {
            background: var(--medium);
        }

        .ticket-card.low::before {
            background: var(--low);
        }

        .ticket-card:hover {
            border-color: var(--accent);
            transform: translateX(3px);
            box-shadow: var(--shadow);
        }

        .ticket-title {
            font-family: 'Syne', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: .3rem;
        }

        .ticket-meta {
            font-size: .8rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-wrap: wrap;
        }

        .ticket-actions {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-shrink: 0;
        }

        /* BADGES */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            padding: .25rem .7rem;
            border-radius: 999px;
            font-size: .72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .badge::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
        }

        .badge-low {
            background: rgba(34, 197, 94, .12);
            color: var(--low);
        }

        .badge-medium {
            background: rgba(245, 158, 11, .12);
            color: var(--medium);
        }

        .badge-high {
            background: rgba(239, 68, 68, .12);
            color: var(--high);
        }

        .badge-open {
            background: rgba(79, 142, 247, .12);
            color: var(--open);
        }

        .badge-resolved {
            background: rgba(107, 114, 128, .15);
            color: var(--resolved);
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--surface);
            border: 1px dashed var(--border);
            border-radius: var(--radius);
        }

        .empty-state .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-family: 'Syne', sans-serif;
            font-size: 1.2rem;
            margin-bottom: .5rem;
        }

        .empty-state p {
            color: var(--muted);
            font-size: .9rem;
            margin-bottom: 1.5rem;
        }

        /* FORM */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            max-width: 640px;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: .82rem;
            font-weight: 500;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: .5rem;
        }

        .form-control {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: .7rem 1rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            transition: border-color .18s, box-shadow .18s;
            outline: none;
            appearance: none;
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(79, 142, 247, .15);
        }

        .form-control.is-invalid {
            border-color: var(--high);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .invalid-feedback {
            font-size: .78rem;
            color: var(--high);
            margin-top: .35rem;
        }

        .form-actions {
            display: flex;
            gap: .75rem;
            margin-top: 1.75rem;
        }

        /* DETAIL */
        .detail-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .detail-header {
            padding: 1.75rem 2rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
        }

        .detail-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .detail-body {
            padding: 1.75rem 2rem;
        }

        .detail-description {
            color: #c4c8d4;
            line-height: 1.7;
            font-size: .95rem;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .meta-label {
            font-size: .75rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: .3rem;
        }

        .meta-value {
            font-size: .95rem;
            font-weight: 500;
        }

        .detail-footer {
            padding: 1.25rem 2rem;
            border-top: 1px solid var(--border);
            background: rgba(0, 0, 0, .15);
            display: flex;
            gap: .75rem;
            align-items: center;
            flex-wrap: wrap;
        }

        /* COMMENTS */
        .comments-section {
            margin-top: 2rem;
        }

        .comments-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text);
        }

        .comments-title .count {
            background: rgba(79, 142, 247, 0.15);
            color: var(--accent);
            font-size: 0.75rem;
            padding: 0.2rem 0.6rem;
            border-radius: 999px;
        }

        .comment-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
        }

        .comment-item {
            background: var(--bg);
            border: 1px solid var(--border);
            border-left: 3px solid var(--accent2);
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
        }

        .comment-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .comment-author {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text);
        }

        .comment-date {
            font-size: 0.75rem;
            color: var(--muted);
        }

        .comment-content {
            font-size: 0.9rem;
            color: #c4c8d4;
            line-height: 1.6;
        }

        .comment-form {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem;
        }

        .comment-form textarea {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            outline: none;
            resize: vertical;
            min-height: 80px;
            transition: border-color .18s;
        }

        .comment-form textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(79, 142, 247, .15);
        }

        .comment-form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 0.75rem;
        }

        /* FOOTER */
        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 2rem 2.5rem;
            margin-top: auto;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 2rem;
            align-items: start;
        }

        .footer-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--text);
            margin-bottom: 0.4rem;
        }

        .footer-desc {
            font-size: 0.8rem;
            color: var(--muted);
            line-height: 1.6;
        }

        .footer-heading {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
            margin-bottom: 0.75rem;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .footer-links a {
            font-size: 0.85rem;
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.18s;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            max-width: 1100px;
            margin: 1.5rem auto 0;
            padding-top: 1.25rem;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-copy {
            font-size: 0.78rem;
            color: var(--muted);
        }

        .footer-status {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.78rem;
            color: var(--low);
        }

        .footer-status::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--low);
            animation: pulse 2s infinite;
        }

        @media(max-width:640px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            nav {
                padding: 0 1rem;
            }

            .container {
                padding: 1.5rem 1rem;
            }

            .meta-grid {
                grid-template-columns: 1fr;
            }

            .ticket-card {
                grid-template-columns: 1fr;
            }

            .footer-inner {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: .5rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a class="nav-brand" href="{{ route('tickets.index') }}">
            <span class="dot"></span> Mini HelpDesk
        </a>
        <div class="nav-right">
            <span class="nav-user">
                👤 {{ Auth::user()->name }}
                @if (Auth::user()->isAdmin())
                    <span class="badge-admin">ADMIN</span>
                @endif
            </span>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm">+ Nouveau ticket</a>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm">Déconnexion</button>
            </form>
        </div>
    </nav>

    <main>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">✓ {{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="footer-inner">
            <div>
                <div class="footer-brand">🎫 Mini HelpDesk</div>
                <div class="footer-desc">Plateforme de gestion de tickets de support. Soumettez vos demandes et suivez
                    leur résolution en temps réel.</div>
            </div>
            <div>
                <div class="footer-heading">Navigation</div>
                <ul class="footer-links">
                    <li><a href="{{ route('tickets.index') }}">Tous les tickets</a></li>
                    <li><a href="{{ route('tickets.filtered', 'open') }}">Tickets ouverts</a></li>
                    <li><a href="{{ route('tickets.filtered', 'resolved') }}">Tickets résolus</a></li>
                    <li><a href="{{ route('tickets.create') }}">Nouveau ticket</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-heading">Compte</div>
                <ul class="footer-links">
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    <li><a href="#">{{ Auth::user()->email }}</a></li>
                    @if (Auth::user()->isAdmin())
                        <li><a href="{{ route('tickets.index') }}">Administration</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span class="footer-copy">© {{ date('Y') }} Mini HelpDesk — Projet PPE</span>
            <span class="footer-status">Système opérationnel</span>
        </div>
    </footer>

</body>

</html>
