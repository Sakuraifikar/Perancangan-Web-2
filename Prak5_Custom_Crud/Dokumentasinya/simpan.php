<?php
include 'koneksi.php';

$id_project  = $_POST['id_project'];
$judul       = $_POST['judul'];
$genre       = $_POST['genre'];
$tahun_rilis = $_POST['tahun_rilis'];
$status      = $_POST['status'];

$query = "UPDATE animasi_projects SET 
            judul='$judul', 
            genre='$genre', 
            tahun_rilis='$tahun_rilis', 
            status='$status'
          WHERE id_project='$id_project'";

if (mysqli_query($conn, $query)) {
    header("Location: tampil_animasi.php");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($conn);
}
?>
