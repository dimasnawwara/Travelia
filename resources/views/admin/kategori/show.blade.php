@extends('admin.layout')


@section('content')

<h2 class="section-title">Kategori {{ ucfirst($kategori) }}</h2>

<div class="destinations">

    @foreach ($items as $item)
    <div class="card">
        <img src="{{ asset('storage/' . $item->gambar) }}" alt="">

        <div class="card-body">
            <h3>{{ $item->judul }}</h3>
            <p>{{ $item->deskripsi }}</p>

            <div class="rating">{{ $item->rating ?? '5.0' }}</div>
        </div>

        <a href="{{ route('destinasi.show', $item->id) }}" class="btn-detail">Detail</a>
    </div>
    @endforeach

</div>

@if ($items->count() == 0)
<p style="text-align:center; margin-top:20px;">Belum ada destinasi kategori ini.</p>
@endif

@endsection
