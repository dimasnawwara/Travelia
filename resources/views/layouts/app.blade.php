<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelia</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @yield('css')
</head>
<body>

    {{-- NAVBAR --}}
    <div class="navbar">
        <h2 class="logo">
            <img src="{{ asset('images/logotravelia.jpg') }}" width="28">
            Travelia
        </h2>

        <div class="nav-right">
            <div class="nav-links">
                <a href="{{ url('/') }}#home">Home</a>
                <a href="{{ url('/') }}#kategori">Destinasi</a>
                <a href="{{ url('/') }}#tentang">Tentang</a>
                <a href="{{ url('/') }}#kontak">Kontak</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
