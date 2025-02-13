@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Kota</h1>

        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('kota.create') }}" class="btn btn-primary mb-3">Tambah Kota</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kotas as $key => $kota)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $kota->nama }}</td>
                                <td>
                                    <a href="{{ route('kota.edit', $kota->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kota.destroy', $kota->id) }}" method="POST"
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
