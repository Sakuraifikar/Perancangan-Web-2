<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM namasiswa WHERE id=$id");
$d = mysqli_fetch_array($data);
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Edit Data</h2>

<form action="proses_edit.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $d['id'] ?>">
    <input type="text" name="nama" value="<?= $d['nama'] ?>" required>

    <p>Foto Lama:</p>
    <img src="gambar/<?= $d['foto'] ?>" height="100"><br><br>

    <p>Ganti Foto (opsional):</p>
    <input type="file" name="foto">

    <button type="submit">Update</button>
</form>

<a href="index.php" class="button">Kembali</a>
</div>
