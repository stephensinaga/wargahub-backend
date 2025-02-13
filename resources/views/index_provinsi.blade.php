@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Provinsi</h1>

        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('provinsi.create') }}" class="btn btn-primary mb-3">Tambah Provinsi</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Provinsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($provinsis as $key => $provinsi)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $provinsi->nama }}</td>
                                <td>
                                    <a href="{{ route('provinsi.edit', $provinsi->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('provinsi.destroy', $provinsi->id) }}" method="POST"
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
