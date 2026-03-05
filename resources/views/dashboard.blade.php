<!DOCTYPE html>
<html>
<head>
    <title>Public Dashboard</title>
</head>
<body>

<h1>Public Dashboard</h1>
<p>You are browsing as a public user.</p>

<nav>
    <a href="{{ route('dashboard') }}">Home</a> |
    <a href="{{ route('profil') }}">Profil</a> |
    <a href="{{ route('fasilitas') }}">Fasilitas</a> |
    <a href="{{ route('guru') }}">Guru</a> |
    <a href="{{ route('berita') }}">Berita</a> |
    <a href="{{ route('eskul') }}">Eskul</a> |
    <a href="{{ route('mitra') }}">Mitra</a> |
    <a href="{{ route('kontak') }}">Kontak</a> |
    <a href="{{ route('gallery') }}">Gallery</a> |
    <a href="{{ route('settings') }}">Settings</a>
</nav>

<hr>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

</body>
</html>
