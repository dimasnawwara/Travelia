@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kategori.css') }}">

<div class="kategori-container">

    <div class="kategori-left">
        <h2 class="kategori-title">Kategori Destinasi</h2>
        <p class="kategori-subtitle">Pilih jenis liburan sesuai keinginanmu</p>

        <div class="kategori-buttons">
            <a href="{{ route('kategori.show', 'pantai') }}" class="btn-kategori">Pantai</a>
            <a href="{{ route('kategori.show', 'budaya') }}" class="btn-kategori">Budaya</a>
            <a href="{{ route('kategori.show', 'gunung') }}" class="btn-kategori">Gunung</a>
        </div>
    </div>

    <div class="kategori-right">
        <div class="kategori-img-wrap">
            <img src="{{ asset('images/kategori_pantai.jpg') }}" class="kategori-img">
        </div>
        <div class="kategori-img-wrap">
            <img src="{{ asset('images/kategori_budaya.jpg') }}" class="kategori-img">
        </div>
        <div class="kategori-img-wrap">
            <img src="{{ asset('images/kategori_gunung.jpg') }}" class="kategori-img">
        </div>
    </div>

</div>

@endsection
