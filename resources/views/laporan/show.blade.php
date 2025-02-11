@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('contents')
<div class="container">
    <h2 class="mb-4">Detail Laporan</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Kategori:</strong> {{ $report->category }}</p>
            <p><strong>Deskripsi:</strong> {{ $report->description }}</p>
            <p><strong>Status:</strong> <span class="badge badge-warning">{{ $report->status }}</span></p>
            <p><strong>Tanggal:</strong> {{ $report->created_at->format('d-m-Y') }}</p>
            <p><strong>Alamat:</strong> {{ $report->address }}</p>

            <h5>Foto Bukti:</h5>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $report->photo_1) }}" class="img-fluid" alt="Foto 1">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $report->photo_2) }}" class="img-fluid" alt="Foto 2">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $report->photo_3) }}" class="img-fluid" alt="Foto 3">
                </div>
            </div>

            <a href="{{ route('laporan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
