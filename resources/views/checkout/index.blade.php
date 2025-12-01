@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

<div class="checkout-page-bg">
    <div class="checkout-wrapper">

        <!-- LEFT SIDE FORM -->
        <div class="checkout-left">
            <h2 class="checkout-title">Checkout Tiket Wisata</h2>

            <form action="{{ route('checkout.store', $destinasi->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="checkout-label">Nama</label>
                    <input type="text" name="nama" class="checkout-input" required>
                </div>

                <div class="form-group">
                    <label class="checkout-label">Email</label>
                    <input type="email" name="email" class="checkout-input" required>
                </div>

                <div class="form-group">
                    <label class="checkout-label">Tujuan Wisata</label>
                    <input 
                        type="text" 
                        class="checkout-input" 
                        value="{{ $destinasi->judul }}" 
                        readonly
                    >
                </div>

                <div class="form-group">
                    <label class="checkout-label">Jumlah Tiket</label>
                    <input 
                        type="number" 
                        name="jumlah" 
                        id="jumlah" 
                        class="checkout-input" 
                        min="1" 
                        value="1" 
                        required
                    >
                </div>

                <button class="checkout-btn">Pesan Tiket</button>
            </form>
        </div>

        <!-- RIGHT SUMMARY -->
        <div class="checkout-summary">
            <h3 class="summary-title">Ringkasan Pesanan</h3>

            <div class="summary-item">
                <span class="summary-name">{{ $destinasi->judul }}</span>
                <span class="summary-price" id="hargaSatuan">
                    Rp {{ number_format($destinasi->harga, 0, ',', '.') }}
                </span>
            </div>

            <div class="summary-total">
                Total  
                <strong id="totalHarga">
                    Rp {{ number_format($destinasi->harga, 0, ',', '.') }}
                </strong>
            </div>
        </div>

    </div>
</div>

<script>
    const harga = {{ $destinasi->harga }};
    const jumlahInput = document.getElementById('jumlah');
    const totalHarga = document.getElementById('totalHarga');

    function formatRupiah(angka) {
        return "Rp " + angka.toLocaleString("id-ID");
    }

    jumlahInput.addEventListener("input", function() {
        let jumlah = parseInt(jumlahInput.value);

        if (isNaN(jumlah) || jumlah < 1) jumlah = 1;

        const total = harga * jumlah;
        totalHarga.textContent = formatRupiah(total);
    });
</script>

@endsection
