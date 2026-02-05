<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Publik</title>
</head>
<body>

<h1>Dashboard Publik</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('admin.apply') }}">
    <button>Ajukan Jadi Admin</button>
</a>

<a href="{{ route('login') }}">
    <button>Login Admin</button>
</a>

</body>
</html>
