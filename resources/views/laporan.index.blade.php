<div class="row">
    <!-- Notifikasi Laporan Masuk -->
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Laporan Baru</div>
                        <ul class="list-group">
                            @foreach ($reports as $report)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $report->category }}</strong> -
                                        {{ Str::limit($report->description, 50) }}
                                        <span class="badge badge-warning">{{ $report->status }}</span>
                                    </div>
                                    <a href="{{ route('laporan.show', $report->id) }}" class="btn btn-sm btn-primary">
                                        Lihat Detail
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
