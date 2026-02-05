<!DOCTYPE html>
<html>
<head>
    <title>Edit Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Gallery</h2>

<form action="/gallery/{{ $gallery->ID_Galeri }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="Judul" value="{{ $gallery->Judul }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto Lama</label><br>
        <img src="{{ asset('storage/'.$gallery->Foto) }}" width="120">
    </div>

    <div class="mb-3">
        <label class="form-label">Ganti Foto (opsional)</label>
        <input type="file" name="Foto" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="Keterangan" class="form-control" required>{{ $gallery->Keterangan }}</textarea>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="/gallery" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>

