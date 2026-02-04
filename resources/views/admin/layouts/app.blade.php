<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>

    <nav>
        <a href="{{ route('major.index') }}">Major</a> |
        <a href="{{ route('studentwork.index') }}">Student Work</a>
    </nav>

    <hr>

    <div>
        @yield('content')
    </div>

</body>
</html>
