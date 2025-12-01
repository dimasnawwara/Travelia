@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-container">

    <h1 class="contact-title">Hubungi Kami</h1>
    <p class="contact-subtitle">Kirim pesan atau pertanyaanmu di sini</p>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ Auth::user()->name }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <div class="form-group">
            <label>Pesan</label>
            <textarea name="pesan" required></textarea>
        </div>

        <button class="btn-kirim">Kirim Pesan</button>
    </form>

    <hr class="divider">

    <h2 class="history-title">Riwayat Pesan Kamu</h2>

    {{-- Tabel Pesan --}}
    <div class="table-wrapper">
        <table class="contact-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $item)
                <tr>
                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                    <td class="pesan-cell">{{ $item->pesan }}</td>
                    <td>
                        <form action="{{ route('contact.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="empty-row">Belum ada pesan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
