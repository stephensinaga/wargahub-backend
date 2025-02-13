@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Petugas</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Petugas</label>
                        <input type="text" name="nama" class="form-control" value="{{ $petugas->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Petugas</label>
                        <input type="email" name="email" class="form-control" value="{{ $petugas->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control">
                            <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="operator" {{ $petugas->level == 'operator' ? 'selected' : '' }}>Operator</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
