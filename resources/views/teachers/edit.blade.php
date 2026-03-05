<h2>Edit Guru</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/teachers/{{ $teacher->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $teacher->name }}"><br><br>
    <input type="text" name="nip" value="{{ $teacher->nip }}"><br><br>
    <input type="text" name="school_subject" value="{{ $teacher->school_subject }}"><br><br>

    <input type="file" name="photo"><br><br>

    @if ($teacher->photo)
        <img src="{{ asset('storage/'.$teacher->photo) }}" width="120"><br><br>
    @endif

    <button type="submit">Update</button>
</form>

<a href="/teachers">⬅ Kembali</a>
