<h2>Pengajuan Admin</h2>

<form method="POST">
    @csrf

    <input name="name" placeholder="Nama" required>
    <input name="email" placeholder="Email" required>

    {{-- PILIH AKSES ADMIN (HANYA SATU) --}}
    <p>Ajukan sebagai admin untuk:</p>

    <label>
        <input type="radio" name="permissions[]" value="berita" required>
        Admin Berita
    </label>

    <br>

    <label>
        <input type="radio" name="permissions[]" value="jurusan">
        Admin Jurusan
    </label>

    <br><br>

    <textarea name="reason" placeholder="Alasan" required></textarea>

    <button type="submit">Kirim</button>
</form>
