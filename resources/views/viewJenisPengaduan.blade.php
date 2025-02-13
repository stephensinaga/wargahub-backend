@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Jenis Pengaduan</h1>

        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('jenispengaduan.create') }}" class="btn btn-primary mb-3">Tambah Jenis Pengaduan</a>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenis Pengaduan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenispengaduan as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <a href="{{ route('jenispengaduan.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('jenispengaduan.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
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
