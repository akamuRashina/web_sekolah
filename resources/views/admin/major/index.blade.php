@extends('admin.layouts.app')

@section('content')
<h1>Data Major</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('major.create') }}">Tambah Major</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Name Major</th>
        <th>Description</th>
        <th>Aksi</th>
    </tr>

    @forelse ($majors as $item)
    <tr>
        <td>{{ $item->name_major }}</td>
        <td>{{ $item->description }}</td>
        <td>
            <a href="{{ route('major.show', $item->id) }}">Detail</a> |
            <a href="{{ route('major.edit', $item->id) }}">Edit</a> |

            <form action="{{ route('major.destroy', $item->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="3">data masih kosong</td></tr>
    @endforelse
</table>

<br>
{{ $majors->links() }}
@endsection
