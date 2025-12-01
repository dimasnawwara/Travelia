@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('adminstyle/admin-contacts.css') }}">

<div class="contacts-container">
    <h2 class="contacts-title">Daftar Pesan Masuk</h2>
    <p class="contacts-subtitle">Pesan dari pengguna website</p>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table class="contacts-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td class="pesan-kolom">{{ Str::limit($contact->message, 50) }}</td>
                    <td>
    <div class="btn-group">
        <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn-detail">Detail</a>

        <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
              method="POST"
              onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button class="btn-delete">Hapus</button>
        </form>
    </div>
</td>

                </tr>
                @empty
                <tr class="empty-row">
                    <td colspan="4">Belum ada pesan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
