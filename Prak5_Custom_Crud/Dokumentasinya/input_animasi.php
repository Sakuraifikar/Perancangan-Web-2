<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul       = $_POST['judul'];
    $genre       = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $status      = $_POST['status'];

    $query = "INSERT INTO animasi_projects (judul, genre, tahun_rilis, status)
              VALUES ('$judul', '$genre', '$tahun_rilis', '$status')";

    if (mysqli_query($conn, $query)) {
        header("Location: tampil_animasi.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>
