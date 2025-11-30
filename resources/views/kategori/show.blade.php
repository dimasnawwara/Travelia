@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kategori-detail.css') }}">

<div class="kategori-wrapper">

    {{-- Judul kategori --}}
    <h1 class="kategori-title">{{ ucfirst($kategori) }}</h1>

    <div class="kategori-grid">
        @foreach ($items as $item)
        <div class="kategori-card">

            <div class="kategori-image">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
            </div>

            <div class="kategori-card-body">
                <h3 class="destinasi-nama">{{ $item->judul }}</h3>

                <p class="destinasi-deskripsi">
                    {{ Str::limit($item->deskripsi, 90) }}
                </p>

                <p class="destinasi-harga">
                    💰 Rp {{ number_format($item->harga, 0, ',', '.') }}
                </p>

                <div class="destinasi-rating">
                    ⭐ {{ $item->rating }}/5
                </div>

                <a href="{{ route('checkout', $item->id) }}" class="checkout-btn">Checkout</a>
            </div>

        </div>
        @endforeach
    </div>

</div>
@endsection
