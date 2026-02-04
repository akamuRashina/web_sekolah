@extends('admin.layouts.app')

@section('content')
<h1>Data Student Work</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('studentwork.create') }}">Tambah Student Work</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Nama Siswa</th>
        <th>Aksi</th>
    </tr>

    @foreach ($studentWorks as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->student_name }}</td>
        <td>
            <a href="{{ route('studentwork.show', $item->id) }}">Detail</a> |
            <a href="{{ route('studentwork.edit', $item->id) }}">Edit</a> |

            <form action="{{ route('studentwork.destroy', $item->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<br>
{{ $studentWorks->links() }}
@endsection
