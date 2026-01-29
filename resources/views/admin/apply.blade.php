<h2>Pengajuan Admin</h2>

<form method="POST">
    @csrf

    <input name="name" placeholder="Nama">
    <input name="email" placeholder="Email">
    <textarea name="reason" placeholder="Alasan"></textarea>

    <button>Kirim</button>
</form>
