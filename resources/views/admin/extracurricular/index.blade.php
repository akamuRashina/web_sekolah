<h1>Daftar Ekstrakurikuler</h1>

<a href="{{ route('extracurricular.create') }}">+ Tambah Ekskul</a>

<table border="1" cellpadding="10" style="margin-top: 20px; border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Nama Ekskul</th>
            <th>Pembimbing</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($extracurricular as $item)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $item->extracurricular_name }}</td>
            <td>{{ $item->instructor }}</td>
            <td>{{ $item->description ?? '-' }}</td>
            <td align="center">
                <a href="{{ route('extracurricular.show', $item->id) }}">Detail</a> |
                <a href="{{ route('extracurricular.edit', $item->id) }}">Edit</a> |
                <form action="{{ route('extracurricular.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" align="center">Data masih kosong.</td>
        </tr>
        @endforelse
    </tbody>
</table>