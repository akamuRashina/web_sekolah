<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Category</title>
</head>
<body>

<h1>Daftar Category</h1>

<a href="{{ route('category.create') }}">+ Tambah Category</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Category</th>
        <th>Aksi</th>
    </tr>

    @foreach ($categories as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td>
        <td>
            <a href="{{ route('category.edit', $item->id) }}">Edit</a>

            <form action="{{ route('category.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>