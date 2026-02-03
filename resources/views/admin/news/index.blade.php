<!DOCTYPE html>
<html>
<head>
    <title>News List</title>
</head>
<body>
    <h2>News List</h2>

    <a href="{{ url('/news/create') }}">Add News</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Publish Date</th>
        </tr>
        @foreach ($news as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->category->category_name }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->publish_date }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>