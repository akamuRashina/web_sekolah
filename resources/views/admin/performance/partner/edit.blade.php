<h2>edit partner</h2>

<form action="{{ route('partner.update', $partner->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $partner->name }}"><br><br>
    <input type="text" name="field" value="{{ $partner->field }}"><br><br>
    <textarea name="address">{{ $partner->address }}</textarea><br><br>
    <input type="text" name="phone" value="{{ $partner->phone }}"><br><br>
    <input type="email" name="email" value="{{ $partner->email }}"><br><br>

    <select name="status">
        <option value="active" {{ $partner->status == 'active' ? 'selected' : '' }}>active</option>
        <option value="inactive" {{ $partner->status == 'inactive' ? 'selected' : '' }}>inactive</option>
    </select><br><br>

    <button type="submit">update</button>
</form>
