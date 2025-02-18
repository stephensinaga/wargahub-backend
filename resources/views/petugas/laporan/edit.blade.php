@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Perbarui Status Laporan</h2>
        <form action="{{ route('petugas.laporan.update', $laporan->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="status" class="form-label">Status Laporan</label>
                <select name="status" id="status" class="form-control">
                    <option value="proses" {{ $laporan->status == 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
                    <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
