@extends('layouts.app')

@section('content')
<div class="detail-container">

    <div class="detail-card">

        {{-- Gambar --}}
        <img src="{{ asset('storage/' . $destinasi->gambar) }}" class="detail-img" alt="{{ $destinasi->nama }}">

        <div class="detail-body">

            {{-- Nama --}}
            <h2 class="detail-title">{{ $destinasi->nama }}</h2>

            {{-- Harga --}}
            <p class="detail-price">
                Rp {{ number_format($destinasi->harga, 0, ',', '.') }}
            </p>

            {{-- Rating --}}
            <span class="detail-rating">⭐ {{ $destinasi->rating }}</span>

            {{-- Deskripsi --}}
            <p class="detail-desc">
                {{ $destinasi->deskripsi }}
            </p>

        </div>
    </div>

</div>
@endsection
