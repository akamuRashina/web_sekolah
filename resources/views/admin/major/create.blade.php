@extends('admin.layouts.app')

@section('content')
<h1>Tambah Major</h1>

<form action="{{ route('major.store') }}" method="POST">
    @csrf

    <div>
        <label>Name Major</label><br>
        <input type="text" name="name_major" value="{{ old('name_major') }}">
        @error('name_major')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <div>
        <label>Description</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit">Simpan</button>
    <a href="{{ route('major.index') }}">Kembali</a>
</form>
@endsection
