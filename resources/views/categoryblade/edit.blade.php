<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Category</title>
</head>
<body>

<h1>Tambah Category</h1>

<form action="{{ route('category.store') }}" method="POST">
    @csrf

    <label>Nama Category</label><br>
    <input type="text" name="name" required><br><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('category.index') }}">Kembali</a>

</body>
</html>