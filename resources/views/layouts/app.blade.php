<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini HelpDesk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary px-4 mb-4">
        <a class="navbar-brand fw-bold" href="{{ route('tickets.index') }}">🎫 Mini HelpDesk</a>
        <a href="{{ route('tickets.create') }}" class="btn btn-light btn-sm">+ New Ticket</a>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>

</html>
