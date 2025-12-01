<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM namasiswa");
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Data Foto Siswa</h2>

<a href="tambah.php" class="button">+ Tambah Data</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>

<?php while($d = mysqli_fetch_array($data)) { ?>
<tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['nama'] ?></td>
    <td><img src="gambar/<?= $d['foto'] ?>" height="80"></td>
    <td>
        <a href="edit.php?id=<?= $d['id'] ?>" class="button">Edit</a>
        <a href="hapus.php?id=<?= $d['id'] ?>" class="button" 
           onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>
</div>
