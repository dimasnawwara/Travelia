<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('adminstyle/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('adminstyle/destinasi.css') }}">
    <link rel="stylesheet" href="{{ asset('adminstyle/admin-pesanan.css') }}">
    <link rel="stylesheet" href="{{ asset('adminstyle/admin-contacts.css') }}">
    <link rel="stylesheet" href="{{ asset('adminstyle/admin-users.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kategori.css') }}">
    @yield('css')
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="sidebar-header">
            <div class="user-info">
                <img src="{{ asset('adminstyle/img/admin.jpg') }}" class="avatar-img">
                <h3>Administrator</h3>
            </div>
        </div>

        <ul class="menu-list">
        <li><a href="/admin"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
        <li><a href="/admin/destinasi"><i class="fa-solid fa-earth-asia"></i> Destinasi</a></li>
        <li><a href="/admin/users"><i class="fa-solid fa-user-group"></i> Users</a></li>
        <li><a href="/admin/pesanan"><i class="fa-solid fa-ticket"></i> Pesanan</a></li>
        <li><a href="/admin/contacts"><i class="fa-solid fa-envelope"></i> Contacts</a></li>
        </ul>

        <form action="/logout" method="POST">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>

    </div>

    <!-- Main Content -->
    <div class="main-wrapper">

        <div class="topbar">
            <h2 class="page-title">Welcome Admin!</h2>
        </div>

        @yield('content')

    </div>

    <script>
        window.salesMonths = @json($months ?? []);
        window.salesData   = @json($salesData ?? []);
    </script>

    <script src="{{ asset('adminstyle/dashboard.js') }}"></script>
</body>
</html>
