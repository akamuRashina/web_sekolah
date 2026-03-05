<!DOCTYPE html>
<html>
<head>
    <title>News Detail</title>
</head>
<body>
    <h2>News Detail</h2>

    <p><strong>Title:</strong> {{ $news->title }}</p>
    <p><strong>Category:</strong> {{ $news->categories->category_name }}</p>
    <p><strong>Status:</strong> {{ $news->status }}</p>
    <p><strong>Publish Date:</strong> {{ $news->publish_date }}</p>

    <hr>

    <p>{{ $news->content }}</p>

    <a href="{{ url('/news') }}">Back</a>
</body>
</html>