<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    
    body {
        background-color: #fff0f5;
        font-family: 'Inter', sans-serif;
    }
    .navbar, .btn-primary, .bg-primary {
        background-color: #ff69b4 !important;
        border-color: #ff69b4 !important;
    }
    .btn-primary:hover {
        background-color: #ff1493 !important;
        border-color: #ff1493 !important;
    }
    .btn-outline-primary {
        color: #ff69b4 !important;
        border-color: #ff69b4 !important;
    }
    .btn-outline-primary:hover {
        background-color: #ff69b4 !important;
        color: white !important;
    }
    .form-control:focus {
        border-color: #ff69b4;
        box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.25);
    }
    h2, label {
        color: #d63384;
    }
    .card {
        border: 1px solid #ffc0cb;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(255, 105, 180, 0.1);
        background: #fff;
    }
    .card:hover {
    transform: translateY(-5px);
    transition: 0.3s ease;
}

</style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @auth
                    <span class="ms-auto">Hi, {{ Auth::user()->name }} | <a href="{{ url('/logout') }}"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
    </a>

    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
