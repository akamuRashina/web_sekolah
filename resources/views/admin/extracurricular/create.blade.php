<!-- resources/views/extracurriculars/create.blade.php -->


@section('content')
<div class="container">
    <h2>Create Extracurricular</h2>
    <form action="{{ route('extracurricular.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="extracurricular_name">Extracurricular Name</label>
            <input type="text" name="extracurricular_name" id="extracurricular_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="instructor">Instructor</label>
            <input type="text" name="instructor" id="instructor" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
