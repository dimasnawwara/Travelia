@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

<div class="checkout-container" style="padding-top: 90px;">


    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="checkout-title">Checkout Pemesanan Tiket</h2>

    <div class="checkout-box">

        {{-- KIRI - Gambar + info destinasi --}}
        <div class="checkout-left">

            <img src="{{ asset('storage/' . $item->gambar) }}" 
                 alt="{{ $item->nama }}"
                 class="checkout-img">

            <h3 class="dest-title">{{ $item->nama }}</h3>

            <p class="dest-price">
                Rp {{ number_format($item->harga, 0, ',', '.') }}
            </p>

            <p class="dest-desc">{{ $item->deskripsi }}</p>

        </div>


        {{-- KANAN - Form Pemesanan --}}
        <div class="checkout-form">

            <form action="{{ route('checkout.store', $item->id) }}" method="POST">
                @csrf

                <label>Nama Pemesan</label>
                <input type="text" name="nama" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Jumlah Tiket</label>
                <input type="number" id="jumlah" name="jumlah" min="1" value="1" required>

                <label>Total Harga</label>
                <input type="text" id="total_harga" readonly class="total-input">

                <button type="submit" class="btn-pesan">Pesan Tiket</button>
            </form>

        </div>

    </div>

</div>

<script>
    const harga = {{ $item->harga }};
    const jumlah = document.getElementById('jumlah');
    const total = document.getElementById('total_harga');

    function updateTotal() {
        let j = parseInt(jumlah.value) || 1;
        total.value = "Rp " + (j * harga).toLocaleString('id-ID');
    }

    jumlah.addEventListener('input', updateTotal);
    updateTotal();
</script>

@endsection
