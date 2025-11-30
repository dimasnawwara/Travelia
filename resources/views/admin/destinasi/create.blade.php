@extends('admin.layout')

@section('content')
<div class="admin-card" style="max-width: 600px; margin:auto;">

    <h2 class="text-2xl font-bold mb-4">Tambah Destinasi</h2>

    <form action="{{ route('admin.destinasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="judul" class="admin-input" placeholder="Judul Destinasi">

        <textarea name="deskripsi" class="admin-textarea" placeholder="Deskripsi"></textarea>

        <select name="kategori" class="admin-input">
    <option value="">-- Pilih Kategori --</option>
    <option value="gunung">Gunung</option>
    <option value="pantai">Pantai</option>
    <option value="budaya">Budaya</option>
</select>

<label class="flex items-center gap-2 mt-3">
    <input type="checkbox" name="is_populer" value="1">
    <span>Jadikan Destinasi Populer</span>
</label>


        <input type="number" name="harga" class="admin-input" placeholder="Harga">

        <input type="number" step="0.1" name="rating" class="admin-input" placeholder="Rating">

        <input type="file" name="gambar" class="admin-input">

        <button class="admin-btn">Simpan</button>
    </form>

</div>
@endsection
