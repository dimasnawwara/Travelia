@extends('admin.layout')

@section('content')
<div class="admin-card" style="max-width: 650px; margin:auto;">

    <h2 class="text-2xl font-bold mb-4">Edit Destinasi</h2>

    <form action="{{ route('admin.destinasi.update', $item->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Judul --}}
        <label class="admin-label">Judul Destinasi</label>
        <input type="text" 
               name="judul" 
               class="admin-input"
               value="{{ $item->judul }}">

        {{-- Deskripsi --}}
        <label class="admin-label">Deskripsi</label>
        <textarea name="deskripsi" 
                  class="admin-textarea"
                  rows="4">{{ $item->deskripsi }}</textarea>

        {{-- Kategori --}}
        <label class="admin-label">Kategori</label>
        <select name="kategori" class="admin-input">
    <option value="gunung" {{ $item->kategori == 'gunung' ? 'selected' : '' }}>Gunung</option>
    <option value="pantai" {{ $item->kategori == 'pantai' ? 'selected' : '' }}>Pantai</option>
    <option value="budaya" {{ $item->kategori == 'budaya' ? 'selected' : '' }}>Budaya</option>
</select>

<label class="flex items-center gap-2 mt-3">
    <input type="checkbox" name="is_populer" value="1" 
        {{ $item->is_populer ? 'checked' : '' }}>
    <span>Tampilkan sebagai Destinasi Populer</span>
</label>


        {{-- Harga --}}
        <label class="admin-label">Harga</label>
        <input type="number" 
               name="harga" 
               class="admin-input"
               value="{{ $item->harga }}">

        {{-- Rating --}}
        <label class="admin-label">Rating</label>
        <input type="number" 
               step="0.1" 
               name="rating" 
               class="admin-input"
               value="{{ $item->rating }}">

        {{-- Gambar --}}
        <label class="admin-label">Gambar Saat Ini</label>
        <img src="{{ asset('storage/'.$item->gambar) }}" 
             class="rounded-lg h-40 w-full object-cover mb-3">

        <label class="admin-label">Upload Gambar Baru (opsional)</label>
        <input type="file" 
               name="gambar" 
               class="admin-input">

        <button class="admin-btn w-full mt-4">Perbarui</button>

    </form>

</div>
@endsection
