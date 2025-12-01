<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT foto FROM namasiswa WHERE id=$id");
$foto = mysqli_fetch_array($data)['foto'];

if (file_exists("gambar/" . $foto)) {
    unlink("gambar/" . $foto);
}

mysqli_query($koneksi, "DELETE FROM namasiswa WHERE id=$id");

header("Location: index.php");
?>
