@extends('layouts.app')

@section('content')

{{-- ================= CSS KHUSUS ================= --}}
<link rel="stylesheet" href="{{ asset('css/kategori.css') }}">


{{-- ================= HERO SECTION ================= --}}
<section id="home" class="hero-wrapper">
    <div class="hero">
        <div class="hero-text">
            <h1>Jelajahi Destinasi Wisata Impianmu</h1>
            <p>Lihat katalog wisata terbaik dengan informasi lengkap dan harga terbaru</p>
        </div>
    </div>
</section>


{{-- ================= KATEGORI DESTINASI ================= --}}
<section id="kategori" class="kategori-section">

    <h2 class="section-title">Kategori Destinasi</h2>
    <p class="section-subtitle">Pilih jenis liburan sesuai keinginanmu</p>

    <div class="kategori-grid">

        {{-- Pantai --}}
        <div class="kategori-card">
            <a href="{{ route('kategori.show', 'pantai') }}">
                <img src="{{ $pantai ? asset('storage/'.$pantai->gambar) : asset('images/default.jpg') }}"
                     class="kategori-img" alt="Kategori Pantai">
                <h3>Pantai</h3>
            </a>
        </div>

        {{-- Budaya --}}
        <div class="kategori-card">
            <a href="{{ route('kategori.show', 'budaya') }}">
                <img src="{{ $budaya ? asset('storage/'.$budaya->gambar) : asset('images/default.jpg') }}"
                     class="kategori-img" alt="Kategori Budaya">
                <h3>Budaya</h3>
            </a>
        </div>

        {{-- Gunung --}}
        <div class="kategori-card">
            <a href="{{ route('kategori.show', 'gunung') }}">
                <img src="{{ $gunung ? asset('storage/'.$gunung->gambar) : asset('images/default.jpg') }}"
                     class="kategori-img" alt="Kategori Gunung">
                <h3>Gunung</h3>
            </a>
        </div>

    </div>

</section>


{{-- ================= DESTINASI POPULER ================= --}}
<section id="destinasi" class="populer-section">

    <h2 class="section-title">Destinasi Populer</h2>

    <div class="kategori-grid">

        @forelse ($popular as $item)
        <div class="kategori-card">

            <div class="kategori-image">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
            </div>

            <div class="kategori-card-body">
                <h3 class="destinasi-nama">{{ $item->judul }}</h3>

                <p class="destinasi-deskripsi">
                    {{ Str::limit($item->deskripsi, 90) }}
                </p>

                <p class="destinasi-harga">💰 Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

                <div class="destinasi-rating">⭐ {{ $item->rating }}/5</div>

                {{-- menggunakan kategori.show untuk detail --}}
                <a href="{{ route('checkout', $item->id) }}" class="checkout-btn">
                    Checkout
                </a>
            </div>

        </div>
        @empty
        <p class="no-data">Belum ada destinasi ditambahkan admin.</p>
        @endforelse

    </div>

</section>


{{-- ================= TENTANG ================= --}}
<section id="tentang" class="tentang-section">

    <div class="tentang-wrapper">

        <div class="tentang-left">
            <h2>Tentang TraveliA</h2>
            <p>
                TraveliA adalah platform perjalanan yang membantu kamu menjelajahi
                destinasi wisata impian dengan informasi lengkap, foto, harga, dan rating.
            </p>

            <div class="tentang-buttons">
                <a href="#" class="btn-info">Akomodasi</a>
                <a href="#" class="btn-info">Atraksi Wisata</a>
                <a href="#" class="btn-info">Restoran & Hotel</a>
            </div>
        </div>

        <div class="tentang-right">
            <h3>Mengapa memilih TraveliA?</h3>
            <p>
                Kami menyajikan informasi terbaru, tips, dan rekomendasi untuk membantu
                merencanakan liburanmu.
            </p>
            <a href="#kategori" class="btn-destinasi">Lihat destinasi</a>
        </div>

    </div>

</section>


{{-- ================= FOOTER ================= --}}
<section id="kontak" class="footer-section">

    <div class="footer-content">

        <div class="footer-left">
            <h3>Kontak kami</h3>

            <p><b>Alamat:</b> Jl. Blah No 112, Aceh, Indonesia</p>
            <p><b>Email:</b> support@travelia.com</p>
            <p><b>Telp/WA:</b> +62 838-9300-8251</p>
            <p><b>Website:</b> www.travelia.com</p>

            <form class="form-contact" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" placeholder="Pesan" required></textarea>
            <button type="submit">Kirim Pesan</button>
            </form>



            <div class="social-links">
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
            </div>
        </div>

        <div class="footer-right">
            <h3>Butuh Bantuan?</h3>
            <p>Layanan pelanggan tersedia setiap hari jam 08.00—21.00 WIB.</p>
            <p><b>Hotline:</b> +62 838-9300-8251</p>

            <img src="{{ asset('images/logotravelia.jpg') }}" 
                 alt="Logo TraveliA" 
                 class="footer-logo">
        </div>

    </div>

</section>

@endsection
