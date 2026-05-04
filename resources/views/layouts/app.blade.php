<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Middleware Praktik - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e3f2fd;
        }

        .navbar-custom {
            background-color: #6ea8fe;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Middleware App</a>

            <div class="navbar-nav ms-auto">
                @auth
                    <span class="navbar-text me-3 text-white">
                        👋 {{ auth()->user()->name }}
                        <span class="badge {{ auth()->user()->role == 'admin' ? 'bg-danger' : 'bg-success' }}">
                            {{ ucfirst(auth()->user()->role) }}
                        </span>
                    </span>

                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @if(auth()->user()->role == 'admin')
                        <a class="nav-link" href="{{ route('admin.secret') }}">Admin Panel</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="nav-link btn btn-link text-white">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
