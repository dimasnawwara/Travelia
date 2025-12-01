@extends('admin.layout')

@section('content')

<div class="content">

    <h1 class="title">Dashboard</h1>

    <div class="stats-container">

        {{-- TOTAL DESTINASI --}}
        <div class="stat-box">
            <div class="stat-icon">
                <i class="fa-solid fa-globe"></i>
            </div>
            <div class="stat-info">
                <h3>Total Destinasi</h3>
                <p>{{ $totalDestinasi }}</p>
            </div>
        </div>

        {{-- TOTAL USERS --}}
        <div class="stat-box">
            <div class="stat-icon users">
                <i class="fa-solid fa-user-group"></i>
            </div>
            <div class="stat-info">
                <h3>Total Users</h3>
                <p>{{ $totalUsers }}</p>
            </div>
        </div>

        {{-- TOTAL CHECKOUT --}}
        <div class="stat-box">
            <div class="stat-icon checkout">
                <i class="fa-solid fa-ticket"></i>
            </div>
            <div class="stat-info">
                <h3>Total Checkout</h3>
                <p>{{ $totalPesanan }}</p>
            </div>
        </div>

    </div>

    
    <h2 class="chart-title">Grafik Penjualan Per Bulan</h2>
    <canvas id="salesChart" height="120"></canvas>

</div>

@endsection
