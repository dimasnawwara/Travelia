@extends('admin.layout')

@section('content')

<div class="users-container">

    <h2 class="users-title"><i class="fa-solid fa-user-group"></i> Daftar Users</h2>

    <div class="table-wrapper">

        <table class="users-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        @if($user->is_admin)
                            <span class="badge-admin">Admin</span>
                        @else
                            <span class="badge-user">User</span>
                        @endif
                    </td>

                    <td>
                        <div style="display: flex; gap: 8px;">

                            {{-- Toggle Admin --}}
                            <form action="{{ route('admin.users.toggleAdmin', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn-toggle">
                                    <i class="fa-solid fa-shuffle"></i>
                                    {{ $user->is_admin ? 'Jadikan User' : 'Jadikan Admin' }}
                                </button>
                            </form>

                            {{-- Delete --}}
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">
                                    <i class="fa-solid fa-trash"></i> Hapus
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
