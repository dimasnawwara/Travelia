@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

<div class="checkout-page-bg">
    <div class="checkout-container">
        <h2 class="checkout-title">Checkout Tiket Wisata</h2>

        <form action="{{ route('checkout.store', $destinasi->id) }}" method="POST">
            @csrf

            <div class="checkout-row">
                <div class="form-group">
                    <label class="checkout-label">Nama</label>
                    <input type="text" name="nama" class="checkout-input" required>
                </div>

                <div class="form-group">
                    <label class="checkout-label">Email</label>
                    <input type="email" name="email" class="checkout-input" required>
                </div>
            </div>

            <div class="checkout-row">
                <div class="form-group">
                    <label class="checkout-label">Tujuan Wisata</label>
                    <input type="text" value="{{ $destinasi->nama }}" class="checkout-input" disabled>
                </div>

                <div class="form-group">
                    <label class="checkout-label">Jumlah Tiket</label>
                    <input type="number" name="jumlah" class="checkout-input" min="1" required>
                </div>
            </div>

            <button class="checkout-btn">Pesan</button>
        </form>
    </div>
</div>

@endsection
