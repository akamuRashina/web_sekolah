@extends('admin.layouts.app')

@section('content')
<h1>Edit Major</h1>

<form action="{{ route('major.update', $major->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name Major</label><br>
        <input type="text" name="name_major" value="{{ old('name_major', $major->name_major) }}">
        @error('name_major')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <div>
        <label>Description</label><br>
        <textarea name="description">{{ old('description', $major->Description) }}</textarea>
        @error('description')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit">Update</button>
    <a href="{{ route('major.index') }}">Back</a>
</form>
@endsection
