<!DOCTYPE html>
<html>
<head>
    <title>Profile Sekolah</title>
</head>
<body>

<h2>Profil Sekolah</h2>

{{-- pesan sukses --}}
@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

{{-- error validasi --}}
@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form 
    action="{{ $profile ? url('/profile-school/'.$profile->id) : url('/profile-school') }}" 
    method="POST" 
    enctype="multipart/form-data"
>
    @csrf
    @if ($profile)
        @method('PUT')
    @endif

    <label>Nama Sekolah</label><br>
    <input type="text" name="school_name" value="{{ $profile->school_name ?? '' }}"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="description">{{ $profile->description ?? '' }}</textarea><br><br>

    <label>Alamat</label><br>
    <textarea name="address">{{ $profile->address ?? '' }}</textarea><br><br>

    <label>Nama Kepala Sekolah</label><br>
    <input type="text" name="principal_name" value="{{ $profile->principal_name ?? '' }}"><br><br>

    <label>Jumlah Siswa</label><br>
    <input type="number" name="number_of_students" value="{{ $profile->number_of_students ?? '' }}"><br><br>

    <label>Visi</label><br>
    <textarea name="vision">{{ $profile->vision ?? '' }}</textarea><br><br>

    <label>Misi</label><br>
    <textarea name="mission">{{ $profile->mission ?? '' }}</textarea><br><br>

    <label>Sejarah</label><br>
    <textarea name="history">{{ $profile->history ?? '' }}</textarea><br><br>

    <label>Foto Kepala Sekolah</label><br>
    <input type="file" name="principal_photo"><br><br>

    @if ($profile && $profile->principal_photo)
        <img src="{{ asset('storage/'.$profile->principal_photo) }}" width="150">
        <br><br>
    @endif

    <button type="submit">
        {{ $profile ? 'Update Profil Sekolah' : 'Simpan Profil Sekolah' }}
    </button>
</form>

</body>
</html>
