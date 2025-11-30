@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/kategori.css') }}">
@endsection

@section('content')

<div class="kategori-container">

    <h2 class="title">Kategori Destinasi</h2>
    <p class="subtitle">Pilih jenis liburan sesuai keinginanmu</p>

    <div class="kategori-grid">

        <a href="{{ route('kategori.pantai') }}" class="kategori-card">
            <img src="{{ asset('images/kategori/pantai.jpg') }}" alt="">
            <h3>Pantai</h3>
        </a>

        <a href="{{ route('kategori.budaya') }}" class="kategori-card">
            <img src="{{ asset('images/kategori/budaya.jpg') }}" alt="">
            <h3>Budaya</h3>
        </a>

        <a href="{{ route('kategori.gunung') }}" class="kategori-card">
            <img src="{{ asset('images/kategori/gunung.jpg') }}" alt="">
            <h3>Gunung</h3>
        </a>

    </div>

</div>

@endsection
