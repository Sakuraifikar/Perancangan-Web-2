<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$direktori = "gambar/";

$data = mysqli_query($koneksi, "SELECT foto FROM namasiswa WHERE id=$id");
$old = mysqli_fetch_array($data)['foto'];

if (!empty($_FILES['foto']['name'])) {

    $file = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $ekstensi = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $ukuran = $_FILES['foto']['size'];

    $valid = array("jpg","jpeg","png","gif");

    if (!in_array($ekstensi, $valid)) {
        echo "Ekstensi tidak valid!";
        exit;
    }

    if ($ukuran > 1000000) {
        echo "Ukuran terlalu besar!";
        exit;
    }

    $namaBaru = rand(1000,999999) . "." . $ekstensi;
    move_uploaded_file($tmp, $direktori . $namaBaru);

    if (file_exists($direktori . $old)) {
        unlink($direktori . $old);
    }

    mysqli_query($koneksi, 
        "UPDATE namasiswa SET nama='$nama', foto='$namaBaru' WHERE id=$id");

} else {

    mysqli_query($koneksi, 
        "UPDATE namasiswa SET nama='$nama' WHERE id=$id");
}

header("Location: index.php");
?>
