@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $item->nama }}</h1>

    <img src="{{ asset('storage/' . $item->gambar) }}" width="400px" class="mb-3">

    <p>{{ $item->deskripsi }}</p>

    <a href="{{ url('/checkout/'.$item->id) }}" class="btn btn-success">
        Pesan Tiket
    </a>
</div>
@endsection
