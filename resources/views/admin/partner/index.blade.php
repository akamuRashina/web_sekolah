<h2>partner list</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
<a href="{{ route('partner.create') }}">tambah data</a>

<table border="1" cellpadding="5">
    <tr>
        <th>name</th>
        <th>field</th>
        <th>email</th>
        <th>status</th>
        <th>action</th>
    </tr>

    @forelse($partners as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ $p->field }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->status }}</td>
        <td>
            <a href="{{ route('partner.edit', $p->id) }}">edit</a>

            <form action="{{ route('partner.destroy', $p->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('delete?')">delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan=5>data masih kosong</td></tr>
    @endforelse
</table>
