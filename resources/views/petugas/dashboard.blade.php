@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Laporan yang Dialokasikan</h2>
        @if ($laporans->isEmpty())
            <p>Tidak ada laporan saat ini.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Laporan</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporans as $index => $laporan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $laporan->category }}</td>
                            <td>{{ $laporan->address }}</td>
                            <td>
                                @if ($laporan->status == 'proses')
                                    <span class="badge bg-warning">Sedang Diproses</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('petugas.laporan.edit', $laporan->id) }}" class="btn btn-primary btn-sm">
                                    Perbarui Status
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
