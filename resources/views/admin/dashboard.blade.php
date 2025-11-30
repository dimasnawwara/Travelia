@extends('admin.layout')

@section('content')

<div class="content">

    <h1 class="title">Dashboard</h1>

    <div class="stats-container">
        <div class="stat-box">
            <h3>Total Destinasi</h3>
            <p>{{ $totalDestinasi }}</p>
        </div>

        <div class="stat-box">
            <h3>Total Users</h3>
            <p>{{ $totalUsers }}</p>
        </div>

        <div class="stat-box">
            <h3>Total Checkout</h3>
            <p>{{ $totalCheckout }}</p>
        </div>
    </div>

    <h2 class="chart-title">Grafik Penjualan Per Bulan</h2>

    <canvas id="salesChart" height="120"></canvas>

</div>

@endsection
