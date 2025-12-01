@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('adminstyle/admin-contacts.css') }}">

<div class="contacts-container">
    <h2 class="contacts-title">Detail Pesan</h2>

    <div class="table-wrapper">
        <table class="contacts-table">
            <tr>
                <th>Nama</th>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $contact->email }}</td>
            </tr>
            <tr>
                <th>Pesan</th>
                <td>{{ $contact->message }}</td>
            </tr>
        </table>
    </div>

    <a href="{{ route('admin.contacts.index') }}" class="btn-detail" style="margin-top: 15px; display:inline-block;">
        Kembali
    </a>
</div>
@endsection
