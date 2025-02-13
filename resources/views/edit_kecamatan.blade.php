@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Kecamatan</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Kecamatan</label>
                        <input type="text" name="nama" class="form-control" value="{{ $kecamatan->nama }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
