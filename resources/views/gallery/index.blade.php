<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Data Gallery</h2>

<a href="/gallery/create" class="btn btn-primary mb-3">➕ Tambah Gallery</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($gallery as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->Judul }}</td>
            <td>
                <img src="{{ asset('storage/'.$item->Foto) }}" width="120">
            </td>
            <td>{{ $item->Keterangan }}</td>
            <td>
                <a href="/gallery/{{ $item->ID_Galeri }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/gallery/{{ $item->ID_Galeri }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">Data kosong</td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html>
