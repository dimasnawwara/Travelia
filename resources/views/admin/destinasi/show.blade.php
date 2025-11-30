@extends('layouts.app')

@section('content')
<div class="detail-wrapper">

    <img src="{{ asset('storage/' . $item->gambar) }}" class="detail-img">

    <h1>{{ $item->judul }}</h1>

    <p class="detail-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

    <p class="detail-desc">{{ $item->deskripsi }}</p>

    <span class="rating">Rating: {{ $item->rating ?? '5.0' }}</span>

</div>
@endsection
