@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Destinasi</h1>

    <div class="row">
        @foreach ($destinasi as $item)
            <div class="col-md-4 mb-3">
                <div class="card">

                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p>{{ Str::limit($item->deskripsi, 80) }}</p>

                        <a href="{{ route('destinasi.show', $item->id) }}" class="btn btn-primary">
                            Detail
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
