<?php
include 'koneksi.php';

$id = $_POST['id_project'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$tahun = $_POST['tahun_rilis'];
$status = $_POST['status'];

mysqli_query($conn, "UPDATE animasi_projects SET 
  judul='$judul',
  genre='$genre',
  tahun_rilis='$tahun',
  status='$status'
WHERE id_project='$id'");

header("Location: tampil_animasi.php");
?>
