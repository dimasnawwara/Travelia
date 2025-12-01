@extends('admin.layout')

@section('content')

<link rel="stylesheet" href="{{ asset('adminstyle/admin-pesanan-detail.css') }}">

<div class="pesanan-detail-wrapper">

    <h2 class="pesanan-detail-title">Detail Pesanan</h2>

    <table class="detail-table">
        <tr>
            <th>Nama Pemesan</th>
            <td>{{ $pesanan->nama }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $pesanan->email }}</td>
        </tr>

        <tr>
            <th>Destinasi</th>
            <td>{{ $pesanan->destinasi->judul }}</td>
        </tr>

        <tr>
            <th>Jumlah Tiket</th>
            <td>{{ $pesanan->jumlah }}</td>
        </tr>

        <tr>
            <th>Harga per Tiket</th>
            <td>Rp {{ number_format($pesanan->destinasi->harga) }}</td>
        </tr>

        <tr>
            <th>Total Harga</th>
            <td class="total-harga">
                Rp {{ number_format($pesanan->jumlah * $pesanan->destinasi->harga) }}
            </td>
        </tr>

        <tr>
            <th>Tanggal Pemesanan</th>
            <td>{{ $pesanan->created_at->format('d M Y') }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.pesanan.index') }}" class="btn-kembali">← Kembali</a>

</div>

@endsection
