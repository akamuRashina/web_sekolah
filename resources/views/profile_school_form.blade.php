<h2>Form Profil Sekolah</h2>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
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

    <input type="text" name="school_name" placeholder="Nama Sekolah"
           value="{{ $profile->school_name ?? '' }}"><br><br>

    <textarea name="description" placeholder="Deskripsi">{{ $profile->description ?? '' }}</textarea><br><br>

    <textarea name="address" placeholder="Alamat">{{ $profile->address ?? '' }}</textarea><br><br>

    <input type="text" name="principal_name" placeholder="Nama Kepala Sekolah"
           value="{{ $profile->principal_name ?? '' }}"><br><br>

    <input type="number" name="number_of_students" placeholder="Jumlah Siswa"
           value="{{ $profile->number_of_students ?? '' }}"><br><br>

    <textarea name="vision" placeholder="Visi">{{ $profile->vision ?? '' }}</textarea><br><br>

    <textarea name="mission" placeholder="Misi">{{ $profile->mission ?? '' }}</textarea><br><br>

    <textarea name="history" placeholder="Sejarah">{{ $profile->history ?? '' }}</textarea><br><br>

    <input type="file" name="principal_photo"><br><br>

    @if ($profile && $profile->principal_photo)
        <img src="{{ asset('storage/'.$profile->principal_photo) }}" width="150"><br><br>
    @endif

    <button type="submit">
        {{ $profile ? 'Update Profil Sekolah' : 'Simpan Profil Sekolah' }}
    </button>
</form>
