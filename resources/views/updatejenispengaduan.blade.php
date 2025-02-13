@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Jenis Pengaduan</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('jenispengaduan.update', $jenispengaduan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Jenis Pengaduan</label>
                        <input type="text" name="nama" class="form-control" value="{{ $jenispengaduan->nama }}"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('jenispengaduan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
