<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('adminstyle/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <li><a href="/admin">📊 Dashboard</a></li>
            <li><a href="/admin/destinasi">🌍 Destinasi</a></li>
            <li><a href="/admin/users">👤 Users</a></li>
            <li><a href="/admin/checkout">🛒 Checkout</a></li>
            <li><a href="/admin/contacts">📩 Contacts</a></li>
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
