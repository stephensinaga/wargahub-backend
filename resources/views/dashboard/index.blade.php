@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
    <div class="row">
        <!-- Proses -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('laporan.proses') }}" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2 hover-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Proses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $laporanProses }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Laporan Diterima -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('laporan.diterima') }}" class="text-decoration-none">
                <div class="card border-left-success shadow h-100 py-2 hover-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Diterima
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $laporanDiterima }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Laporan Ditolak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('laporan.ditolak') }}" class="text-decoration-none">
                <div class="card border-left-info shadow h-100 py-2 hover-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laporan Ditolak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $laporanDitolak }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Laporan Masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('laporan.masuk') }}" class="text-decoration-none">
                <div class="card border-left-warning shadow h-100 py-2 hover-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $laporanMasuk }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
