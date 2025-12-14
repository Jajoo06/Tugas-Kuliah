<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartFlood Kabupaten Bandung</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body>

<header class="bg-primary text-white p-3">
    <h4 class="text-center">SmartFlood Kabupaten Bandung</h4>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <a class="navbar-brand" href="/dashboard">Dashboard</a>

    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="/laporan">Laporan</a>
        </li>

        @if(auth()->user()->role === 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/lokasi">Lokasi Sensor</a>
        </li>
        @endif

        <li class="nav-item">
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-link nav-link">Logout</button>
            </form>
        </li>
    </ul>
</nav>

<main class="container mt-4">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center p-2 mt-4">
    © 2025 Smart City Bandung
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
