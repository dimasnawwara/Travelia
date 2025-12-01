@extends('admin.layout')

@section('content')
<div class="content">

    <a href="{{ route('admin.pesanan.index') }}" class="btn-back">
    <i class="fa-solid fa-arrow-left"></i> Kembali</a>


    <h1 class="mb-4">Detail Pesanan</h1>

    <div class="card p-4" style="max-width: 700px">

        <div class="detail-item">
            <strong>Nama Pemesan:</strong>
            <span>{{ $pesanan->nama }}</span>
        </div>

        <div class="detail-item">
            <strong>Email:</strong>
            <span>{{ $pesanan->email }}</span>
        </div>

        <div class="detail-item">
            <strong>Destinasi:</strong>
            <span>{{ $pesanan->destinasi->judul }}</span>
        </div>

        <div class="detail-item">
            <strong>Jumlah Tiket:</strong>
            <span>{{ $pesanan->jumlah_tiket }}</span>
        </div>

        <div class="detail-item">
            <strong>Harga Satuan:</strong>
            <span>
                Rp {{ number_format($pesanan->destinasi->harga, 0, ',', '.') }}
            </span>
        </div>

        <div class="detail-item">
            <strong>Total Harga:</strong>
            <span style="color: green; font-weight: bold;">
                Rp {{ number_format($pesanan->destinasi->harga * $pesanan->jumlah_tiket, 0, ',', '.') }}
            </span>
        </div>

        <div class="detail-item">
            <strong>Tanggal Pesanan:</strong>
            <span>
                {{ \Carbon\Carbon::parse($pesanan->created_at)->format('d M Y') }}
            </span>
        </div>

    </div>

</div>


@endsection
