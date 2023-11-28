@extends('auth.layouts')

@section('content')

<table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>FOTO</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $user)
                <tr>
                
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if( $user->photo )
                            <img src="{{ asset('storage/photos/thumbnail/'. $user->photo ) }}" width="150px"></td>
                        @else
                            <p>Tidak ada gambar</p></td>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('menghapus_data', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" onClick="return confirm('Apakah Anda yakin ingin dihapus?')">Hapus</button>
                        </form>
                        <form action="{{ route('mengedit_data', $user->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-dark">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection