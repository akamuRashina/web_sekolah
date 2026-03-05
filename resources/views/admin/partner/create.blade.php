<h2>edit partner</h2>

<form action="{{ route('partner.store') }}" method="POST">
    @csrf
 

    <p>
        name <br>
        <input type="text" name="name" >
    </p>

    <p>
        field <br>
        <input type="text" name="field" >
    </p>

    <p>
        email <br>
        <input type="email" name="email" >
    </p>

    <p>
        status <br>
        <input type="text" name="status" >
    </p>

    <button type="submit">update</button>
</form>
