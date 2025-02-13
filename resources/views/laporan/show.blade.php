@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Laporan</h1>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Judul</th>
                    <td>{{ $laporan->judul }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $laporan->deskripsi }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $laporan->tanggal }}</td>
                </tr>
            </table>
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
