<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$direktori = "gambar/";

$file = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$ukuran = $_FILES['foto']['size'];
$ekstensi = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$valid = array("jpg","jpeg","png","gif");

if (!in_array($ekstensi, $valid)) {
    echo "Ekstensi tidak valid!";
    exit;
}

if ($ukuran > 1000000) {
    echo "Ukuran file terlalu besar!";
    exit;
}

$namaBaru = rand(1000,999999) . "." . $ekstensi;
move_uploaded_file($tmp, $direktori . $namaBaru);

mysqli_query($koneksi, 
    "INSERT INTO namasiswa VALUES(NULL, '$nama', '$namaBaru')");

header("Location: index.php");
?>
