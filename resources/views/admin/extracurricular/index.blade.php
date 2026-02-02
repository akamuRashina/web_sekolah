<!-- resources/views/extracurriculars/index.blade.php -->
{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <h2>Extracurricular List</h2>
    <a href="{{ route('extracurricular.create') }}" class="btn btn-success mb-3">Add New Extracurricular</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Extracurricular Name</th>
                <th>Description</th>
                <th>Instructor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($extracurricular as $extracurricular)
                <tr>
                    <td>{{ $extracurricular->extracurricular_name }}</td>
                    <td>{{ $extracurricular->description }}</td>
                    <td>{{ $extracurricular->instructor }}</td>
                    <td>
                        <a href="{{ route('extracurricular.edit', $extracurricular->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('extracurricular.destroy', $extracurricular->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this extracurricular?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
