@extends('admin.layouts.app')

@section('content')
<h1>Edit Student Work</h1>

<form action="{{ route('studentwork.update', $studentwork->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Judul</label><br>
        <input type="text" name="judul" value="{{ old('judul', $studentwork->judul) }}">
        @error('judul') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div>
        <label>Nama Siswa</label><br>
        <input type="text" name="student_name" value="{{ old('student_name', $studentwork->student_name) }}">
        @error('student_name') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ old('deskripsi', $studentwork->deskripsi) }}</textarea>
        @error('deskripsi') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div>
        <label>Gambar</label><br>
        @if($studentwork->gambar)
            <img src="{{ asset('storage/'.$studentwork->gambar) }}" width="120"><br>
        @endif
        <input type="file" name="gambar">
    </div>

    <button type="submit">Update</button>
    <a href="{{ route('studentwork.index') }}">Kembali</a>
</form>
@endsection
