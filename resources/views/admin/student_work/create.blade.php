@extends('admin.layouts.app')

@section('content')
<h1>Tambah Student Work</h1>

<form action="{{ route('studentwork.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>title of work</label><br>
        <input type="text" name="title_of_work" value="{{ old('title_of_work') }}">
        @error('title_of_work') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div>
        <label>Description</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <div>
        <label>file of work</label><br>
        <input type="file" name="file_of_work">
        @error('file_of_work') <small style="color:red">{{ $message }}</small> @enderror
    </div>

    <button type="submit">Simpan</button>
    <a href="{{ route('studentwork.index') }}">Kembali</a>
</form>
@endsection
