@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('contents')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Detail Laporan</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $laporan->judul }}</h5>
                <p class="card-text"><strong>Kategori:</strong> {{ $laporan->category }}</p>
                <p class="card-text"><strong>Wilayah:</strong> {{ $laporan->wilayah }}</p>
                <p class="card-text"><strong>Tanggal:</strong> {{ $laporan->tanggal }}</p>
                <p class="card-text"><strong>Deskripsi:</strong></p>
                <p>{{ $laporan->deskripsi }}</p>

                <!-- Tombol Kembali -->
                <a href="{{ route('superadmin.laporan') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
