<?php
include 'koneksi.php';
$id = $_GET['id_project'];

if (isset($id)) {
    $hapus = mysqli_query($conn, "DELETE FROM animasi_projects WHERE id_project='$id'");
    if ($hapus) {
        header("Location: tampil_animasi.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
