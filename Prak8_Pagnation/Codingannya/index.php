<?php 
include 'koneksi.php';

// jumlah data per halaman
$batas = 5;

// halaman aktif
$halaman = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$halaman_awal = ($halaman - 1) * $batas;

// ambil data siswa sesuai halaman
$data_siswa = mysqli_query(
    $koneksi,
    "SELECT * FROM namasiswa ORDER BY id DESC LIMIT $halaman_awal, $batas"
);

// hitung total data
$total_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM namasiswa"));
$total_halaman = ceil($total_data / $batas);
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Siswa</title>

<link rel="stylesheet" href="style.css">

<style>
/* Pagination Style */
.pagination a, .pagination span {
    padding: 6px 12px;
    margin: 2px;
    border: 1px solid #333;
    text-decoration: none;
    color: black;
    border-radius: 4px;
}

.pagination .active {
    background: #333;
    color: white;
}

.pagination .disabled {
    background: #ccc;
    color: #777;
    border-color: #aaa;
}
</style>

</head>

<body>
<div class="container">

<h2>Data Foto Siswa</h2>

<a href="tambah.php" class="button">+ Tambah Data</a>

<table border="1" width="100%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = $halaman_awal + 1;
    while ($d = mysqli_fetch_assoc($data_siswa)) {
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['nama']; ?></td>
        <td><img src="gambar/<?= $d['foto']; ?>" height="70"></td>
        <td>
            <a href="edit.php?id=<?= $d['id']; ?>" class="button">Edit</a>
            <a href="hapus.php?id=<?= $d['id']; ?>" class="button"
               onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>

</table>

<br>

<!-- PAGINATION -->
<div class="pagination">

    <!-- Tombol PREV -->
    <?php if ($halaman > 1) { ?>
        <a href="?page=<?= $halaman - 1; ?>">Prev</a>
    <?php } else { ?>
        <span class="disabled">Prev</span>
    <?php } ?>

    <!-- Nomor halaman -->
    <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
        <?php if ($i == $halaman) { ?>
            <a class="active" href="?page=<?= $i; ?>"><?= $i; ?></a>
        <?php } else { ?>
            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
        <?php } ?>
    <?php } ?>

    <!-- Tombol NEXT -->
    <?php if ($halaman < $total_halaman) { ?>
        <a href="?page=<?= $halaman + 1; ?>">Next</a>
    <?php } else { ?>
        <span class="disabled">Next</span>
    <?php } ?>

</div>

</div>
</body>
</html>
