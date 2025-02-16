@extends('layouts.app')

@section('title', 'Dashboard Superadmin')

@section('contents')
    <h1>Welcome Superadmin</h1>
    <p>Ini adalah dashboard khusus superadmin.</p>

    <h3>Daftar Laporan:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $key => $laporan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ $laporan->category }}</td>
                    <td>{{ $laporan->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
