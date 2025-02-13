<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Buat Laporan Baru</h2>
        <form action="{{ route('laporan.index') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>

            <!-- Tambahkan Input Judul di Sini -->
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Laporan</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="mb-3">
                <label for="photo_1" class="form-label">Foto 1</label>
                <input type="file" class="form-control" id="photo_1" name="photo_1" required>
            </div>
            <div class="mb-3">
                <label for="photo_2" class="form-label">Foto 2</label>
                <input type="file" class="form-control" id="photo_2" name="photo_2" required>
            </div>
            <div class="mb-3">
                <label for="photo_3" class="form-label">Foto 3</label>
                <input type="file" class="form-control" id="photo_3" name="photo_3" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Laporan</button>
        </form>
    </div>
</body>

</html>
