@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('contents')
    <div class="container">
        <h1>Detail Laporan</h1>
        <p><strong>ID:</strong> {{ $laporan->id }}</p>
        <p><strong>Judul:</strong> {{ $laporan->judul }}</p>
        <p><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p>

        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
