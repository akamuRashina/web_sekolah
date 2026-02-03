<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
</head>
<body>
    <h2>Edit News</h2>

    <form action="{{ url('/news/'.$news->news_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title</label><br>
        <input type="text" name="title"
               value="{{ $news->title }}" required>
        <br><br>

        <label>Content</label><br>
        <textarea name="content" required>{{ $news->content }}</textarea>
        <br><br>

        <label>Category</label><br>
        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->category_id }}"
                    {{ $news->category_id == $category->category_id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="draft" {{ $news->status == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ $news->status == 'published' ? 'selected' : '' }}>Published</option>
        </select>
        <br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ url('/news') }}">Back</a>
</body>
</html>