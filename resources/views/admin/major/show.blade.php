@extends('admin.layouts.app')

@section('content')
<h1>Detail Major</h1>

<p>
    <strong>Name Major:</strong><br>
    {{ $major->name_major }}
</p>

<p>
    <strong>Description:</strong><br>
    {{ $major->description }}
</p>

<a href="{{ route('major.index') }}">BACK</a>
@endsection
