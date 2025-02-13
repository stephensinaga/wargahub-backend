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
        <a href="{{ route('laporan.create') }}" class="btn btn-primary mb-3">Tambah Laporan</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->deskripsi }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>
                            <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
