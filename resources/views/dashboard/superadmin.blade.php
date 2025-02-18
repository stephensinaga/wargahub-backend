@extends('layouts.app')

@section('title', 'Dashboard Superadmin')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Dashboard Superadmin</h2>
        <p>Selamat datang, Superadmin!</p>

        <h3>Daftar Semua Laporan:</h3>
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
    </div>
@endsection
