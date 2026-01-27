<h2>Sign Up</h2>

<form method="POST" action="/register">
    @csrf
    <input name="name" placeholder="Nama" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button>Register</button>
</form>

<a href="/login">Sudah punya akun?</a>
