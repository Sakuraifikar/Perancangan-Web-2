<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Tambah Data Foto</h2>

<form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama siswa" required>
    <input type="file" name="foto" required>
    <button type="submit">Simpan</button>
</form>

<a href="index.php" class="button">Kembali</a>
</div>
