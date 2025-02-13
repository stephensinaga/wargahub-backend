@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Petugas</h1>

        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-3">Tambah Petugas</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $key => $p)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ ucfirst($p->level) }}</td>
                                <td>
                                    <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('petugas.destroy', $p->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
