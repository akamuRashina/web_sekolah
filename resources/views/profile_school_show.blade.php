<h1>{{ $profile->school_name ?? 'Profil Sekolah Belum Diisi' }}</h1>

@if ($profile && $profile->principal_photo)
    <img src="{{ asset('storage/'.$profile->principal_photo) }}" width="200">
@endif

<p><strong>Deskripsi:</strong><br>{{ $profile->description}}</p>

<p><strong>Alamat:</strong><br>{{ $profile->address}}</p>

<p><strong>Kepala Sekolah:</strong> {{ $profile->principal_name}}</p>

<p><strong>Jumlah Siswa:</strong> {{ $profile->number_of_students}}</p>

<h3>Visi</h3>
<p>{{ $profile->vision }}</p>

<h3>Misi</h3>
<p>{{ $profile->mission }}</p>

<h3>Sejarah</h3>
<p>{{ $profile->history }}</p>

{{-- <a href="/profile-school/edit">Edit Profil Sekolah</a> --}}
