@extends('layouts.app')

@section('title', 'Laporan Pengaduan')

@section('contents')
    <div class="container mt-4">
        <h2>Laporan Pengaduan</h2>

        <!-- Filter berdasarkan wilayah & jenis laporan -->
        <form method="GET" action="{{ route('superadmin.laporan') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="wilayah" class="form-label">Filter Wilayah</label>
                    <select name="wilayah" class="form-control">
                        <option value="">Semua Wilayah</option>
                        @foreach ($wilayahs as $wilayah)
                            <option value="{{ $wilayah }}" {{ request('wilayah') == $wilayah ? 'selected' : '' }}>
                                {{ $wilayah }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="jenis" class="form-label">Filter Jenis Laporan</label>
                    <select name="jenis" class="form-control">
                        <option value="">Semua Jenis</option>
                        @foreach ($jenisLaporans as $jenis)
                            <option value="{{ $jenis }}" {{ request('jenis') == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Tabel Laporan -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Wilayah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporans as $key => $laporan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->category }}</td>
                        <td>{{ $laporan->wilayah }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>
                            <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada laporan ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
