@extends('admin.layout')


@section('content')

<section class="kategori-section">

    <h2 class="text-4xl font-bold mb-6">
        Kategori {{ ucfirst($kategori) }}
    </h2>

    <div class="grid grid-cols-3 gap-6">

        @foreach($items as $d)
        <div class="bg-white rounded-xl shadow p-3">

            <img src="{{ asset('storage/'.$d->gambar) }}" 
                 class="rounded-lg h-48 w-full object-cover">

            <h3 class="text-xl font-bold mt-3">{{ $d->judul }}</h3>

            <p class="text-gray-500 mt-1">
                {{ Str::limit($d->deskripsi, 100) }}
            </p>

            <a href="{{ route('destinasi.show', $d->id) }}"
               class="bg-blue-600 text-white px-4 py-2 mt-3 inline-block rounded-lg">
               Lihat Detail
            </a>

        </div>
        @endforeach

    </div>

</section>

@endsection
