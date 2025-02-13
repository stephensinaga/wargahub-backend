@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Petugas</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('petugas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Petugas</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Petugas</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="operator">Operator</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
