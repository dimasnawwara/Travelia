@extends('admin.layout')

@section('content')
<div class="container mx-auto py-10">

    <div class="flex justify-between mb-6">
        <h2 class="text-3xl font-bold">Destinasi</h2>

        <a href="{{ route('admin.destinasi.create') }}" class="add-btn">
            + Tambah Destinasi
        </a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Rating</th>
                    <th style="width: 200px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $d)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$d->gambar) }}" class="table-img">
                    </td>

                    <td>{{ $d->judul }}</td>
                    <td>{{ $d->kategori }}</td>

                    <td>Rp {{ number_format($d->harga,0,',','.') }}</td>

                    <td>{{ $d->rating ?? '5.0' }}</td>

           <td>
    <div class="action-group">

        <a href="{{ route('admin.destinasi.edit', $d->id) }}" 
           class="action-btn btn-edit">
            Edit
        </a>

        <form action="{{ route('admin.destinasi.destroy', $d->id) }}" 
              method="POST"
              onsubmit="return confirm('Hapus destinasi ini?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="action-btn btn-delete">
                Hapus
            </button>
        </form>

    </div>
</td>


                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
