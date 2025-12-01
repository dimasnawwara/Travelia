@extends('admin.layout')

@section('content')

<div class="content">

    <h1>Daftar Pesanan</h1>

    <table class="table-pesanan">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Destinasi</th>
                <th>Jumlah Tiket</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pesanan as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->destinasi->judul }}</td>
                <td>{{ $p->jumlah }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>

                <td style="display: flex; gap: 6px;">

                    {{-- Tombol Detail --}}
<a href="{{ route('admin.pesanan.show', $p->id) }}" class="btn-detail">
    <i class="fa-solid fa-eye"></i> Detail
</a>

{{-- Tombol Hapus --}}
<form action="{{ route('admin.pesanan.destroy', $p->id) }}" 
      method="POST" 
      onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')" 
      style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button class="btn-delete">
        <i class="fa-solid fa-trash"></i> Hapus
    </button>
</form>

            @endforeach
        </tbody>

    </table>

</div>

@endsection
