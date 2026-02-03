<!DOCTYPE html>
<html>
<head>
    <title>Tambah Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Tambah Gallery</h2>

<form action="/gallery" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="Judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="Foto" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="Keterangan" class="form-control" rows="3" required></textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="/gallery" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>
