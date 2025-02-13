@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Kecamatan</h1>

        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('kecamatan.create') }}" class="btn btn-primary mb-3">Tambah Kecamatan</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kecamatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatans as $key => $kecamatan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $kecamatan->nama }}</td>
                                <td>
                                    <a href="{{ route('kecamatan.edit', $kecamatan->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST"
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
