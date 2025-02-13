@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Provinsi</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Provinsi</label>
                        <input type="text" name="nama" class="form-control" value="{{ $provinsi->nama }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
