@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">

    <h2 class="text-3xl font-bold mb-6">Destinasi</h2>

    <div class="grid grid-cols-3 gap-6">

        @foreach($items as $d)
        <div class="bg-white rounded-xl shadow p-3">
            <img src="{{ asset('storage/'.$d->gambar) }}" class="rounded-lg h-48 w-full object-cover">

            <h3 class="text-xl font-bold mt-3">{{ $d->judul }}</h3>

            <p class="text-gray-500 mt-1">
                {{ Str::limit($d->deskripsi, 100) }}
            </p>

            <div class="mt-3 text-lg font-semibold">
                Rp {{ number_format($d->harga,0,',','.') }}
            </div>

            <a href="{{ route('destinasi.show', $d->id) }}"
               class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg">
               Detail
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection
