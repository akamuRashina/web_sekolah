@extends('admin.layouts.app')

@section('content')
<h1>Detail Student Work</h1>

<p><strong>Judul:</strong><br>{{ $studentwork->judul }}</p>
<p><strong>Nama Siswa:</strong><br>{{ $studentwork->student_name }}</p>
<p><strong>Deskripsi:</strong><br>{{ $studentwork->deskripsi }}</p>

@if($studentwork->gambar)
    <p>
        <strong>Gambar:</strong><br>
        <img src="{{ asset('storage/'.$studentwork->gambar) }}" width="200">
    </p>
@endif

<a href="{{ route('studentwork.index') }}">Kembali</a>
@endsection
