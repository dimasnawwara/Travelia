@extends('layouts.app')

@section('content')
<div class="checkout-container">
    <h1>Checkout Tiket Wisata</h1>

    <form action="/checkout/{{ $destinasi->id }}" method="POST">
        @csrf

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Tujuan Wisata</label>
        <input type="text" value="{{ $destinasi->nama }}" disabled>

        <label>Jumlah Tiket</label>
        <input type="number" name="jumlah" min="1" required>

        <button class="btn-submit">Pesan</button>
    </form>
</div>
@endsection
