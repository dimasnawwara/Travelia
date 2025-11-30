@extends('layouts.app')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<div id="home" class="hero-wrapper">
    <div class="hero">
        <div>
            <h1>Jelajahi Destinasi Wisata Impianmu</h1>
            <p>Lihat katalog wisata terbaik dengan informasi lengkap dan harga terbaru</p>
        </div>
    </div>
</div>

{{-- ================= DESTINASI POPULER ================= --}}
<h2 class="section-title">Destinasi Populer</h2>

<div class="destinations">

    @forelse ($popular as $p)
    <div class="card">
        <img src="{{ asset('storage/' . $p->gambar) }}" alt="">

        <div class="card-body">
            <h3>{{ $p->judul }}</h3>

            <p>Rp {{ number_format($p->harga, 0, ',', '.') }}</p>

            <div class="rating">{{ $p->rating ?? '5.0' }}</div>
        </div>

        <a href="{{ route('destinasi.show', $p->id) }}" class="btn-detail">Detail</a>
    </div>

    @empty
        <p style="text-align:center; width:100%;">Belum ada destinasi ditambahkan admin.</p>
    @endforelse

</div>

{{-- ================= TENTANG ================= --}}
<section id="tentang" class="tentang-section">
    <div class="tentang-wrapper">

        <div class="tentang-left">
            <h2>tentang TraveliA</h2>
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
            <a href="#destinasi" class="btn-destinasi">Lihat destinasi</a>
        </div>

    </div>
</section>

{{-- ================= FOOTER (tidak diubah) ================= --}}
<section id="kontak" class="footer-section">
    <div class="footer-content">

        <div class="footer-left">
            <h3>Kontak kami</h3>
            <p><b>Alamat:</b> Jl. Blah No 112, Aceh, Indonesia</p>
            <p><b>Email:</b> support@travelia.com</p>
            <p><b>Telp/WA:</b> +62 838-9300-8251</p>
            <p><b>Website:</b> www.travelia.com</p>

            <form class="form-contact">
                <input type="text" placeholder="Nama">
                <input type="email" placeholder="Email">
                <textarea placeholder="Pesan"></textarea>
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
            <img src="{{ asset('images/logotravelia.jpg') }}" class="footer-logo">
        </div>

    </div>
</section>

@endsection

