<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar Laporan</h2>

        <!-- Tombol Tambah Laporan -->
        <a href="{{ route('laporan.create') }}" class="btn btn-success mb-3">Tambah Laporan</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $laporan)
                    <tr>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->category }}</td>
                        <td>{{ $laporan->deskripsi }}</td> <!-- Sesuaikan dengan kolom DB -->
                        <td>{{ $laporan->address }}</td>
                        <td>
                            <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-primary">Lihat Detail</a>
                            @if ($laporan->photo_1)
                                <img src="{{ asset('storage/' . $laporan->photo_1) }}" width="100">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
