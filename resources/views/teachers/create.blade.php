<h2>Tambah Guru</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/teachers" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Nama Guru"><br><br>
    <input type="text" name="nip" placeholder="NIP"><br><br>
    <input type="text" name="school_subject" placeholder="Mata Pelajaran"><br><br>
    <input type="file" name="photo"><br><br>

    <button type="submit">Simpan</button>
</form>

<a href="/teachers">⬅ Kembali</a>
