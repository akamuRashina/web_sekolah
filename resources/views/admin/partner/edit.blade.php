<h2>edit partner</h2>

<form action="{{ route('partner.update', $partner->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        name <br>
        <input type="text" name="name" value="{{ $partner->name }}">
    </p>

    <p>
        field <br>
        <input type="text" name="field" value="{{ $partner->field }}">
    </p>

    <p>
        email <br>
        <input type="email" name="email" value="{{ $partner->email }}">
    </p>

    <p>
        status <br>
        <input type="text" name="status" value="{{ $partner->status }}">
    </p>

    <button type="submit">update</button>
</form>
