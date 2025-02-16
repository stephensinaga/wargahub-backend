@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('contents')
    <div class="container mt-4">
        <h2>Daftar Laporan</h2>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary mb-3">Buat Laporan Baru</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $key => $laporan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->category }}</td>
                        <td>{{ $laporan->address }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>
                            <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
