@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Laporan</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('laporan.update', $laporan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $laporan->judul }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required>{{ $laporan->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $laporan->tanggal }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
