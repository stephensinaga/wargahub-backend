<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 30px auto;
        }

        h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            color: #495057;
        }

        input,
        textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            width: 100%;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="file"] {
            border: none;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2>Buat Laporan Baru</h2>
        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="judul">Judul:</label>
            <input type="text" name="judul" required>

            <label for="category">Kategori:</label>
            <input type="text" name="category" required>

            <label for="photo_1">Foto 1:</label>
            <input type="file" name="photo_1" accept="image/*">

            <label for="photo_2">Foto 2:</label>
            <input type="file" name="photo_2" accept="image/*">

            <label for="photo_3">Foto 3:</label>
            <input type="file" name="photo_3" accept="image/*">

            <label for="description">Deskripsi:</label>
            <textarea name="description" required></textarea>


            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" required>

            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" required>

            <label for="address">Alamat:</label>
            <input type="text" name="address" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" required>

            <button type="submit">Simpan Laporan</button>
        </form>
    </div>
    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            let photo1 = document.querySelector("input[name='photo_1']").files.length;
            let photo2 = document.querySelector("input[name='photo_2']").files.length;
            let photo3 = document.querySelector("input[name='photo_3']").files.length;

            if (photo1 === 0 || photo2 === 0 || photo3 === 0) {
                alert("Semua foto wajib diisi!");
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
