@extends('admin.layout')

@section('content')
<h2>Daftar Pesanan</h2>

<table class="table table-bordered">
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
        @foreach ($pesanan as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->destinasi->nama }}</td>
            <td>{{ $p->jumlah }}</td>
            <td>{{ $p->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('admin.pesanan.show', $p->id) }}" class="btn btn-primary btn-sm">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
