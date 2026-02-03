<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
</head>
<body>
    <h2>Add News</h2>

    <form action="{{ route('news.store') }}" method="POST">
    @csrf
    <label>Judul:</label>
    <input type="text" name="title" required>

    <label>isi:</label>
    <textarea name="content" required></textarea>

    <label>Kategori:</label>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->category_id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label>Tanggal Terbit:</label>
    <input type="date" name="publish_date" required>

    <label>Status:</label>
    <select name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>

    <input type="hidden" name="author_id" value="{{ auth()->id() }}">

    <button type="submit">Simpan</button>
</form>
</body>
</html>