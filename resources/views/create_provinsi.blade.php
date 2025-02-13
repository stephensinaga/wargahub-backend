@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Provinsi</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('provinsi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Provinsi</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
