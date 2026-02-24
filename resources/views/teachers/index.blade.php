<h2>Data Guru</h2>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="/teachers/create">➕ Tambah Guru</a>
<hr>

@forelse ($teachers as $teacher)
    <p>
        <strong>{{ $teacher->name }}</strong><br>
        NIP: {{ $teacher->nip }}<br>
        Mapel: {{ $teacher->school_subject }}<br>

        @if ($teacher->photo)
            <img src="{{ asset('storage/'.$teacher->photo) }}" width="80">
        @endif
        <br>

        <a href="/teachers/{{ $teacher->id }}/edit">✏ Edit</a>

        <form action="/teachers/{{ $teacher->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin hapus?')">
                🗑 Hapus
            </button>
        </form>
    </p>
    <hr>
@empty
    <p>Belum ada data guru.</p>
@endforelse
