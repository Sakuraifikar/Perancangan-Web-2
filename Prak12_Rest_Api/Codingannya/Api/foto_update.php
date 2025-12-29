<?php
header("Content-Type: application/json");
include "../koneksi.php";

$id   = $_POST['id'];
$nama = $_POST['nama'];

$data = mysqli_query($koneksi, "SELECT foto FROM namasiswa WHERE id=$id");
$old = mysqli_fetch_assoc($data)['foto'];

if (!empty($_FILES['foto']['name'])) {

    $file = $_FILES['foto'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $namaBaru = rand(1000,999999).".".$ext;

    move_uploaded_file($file['tmp_name'], "../gambar/".$namaBaru);
    unlink("../gambar/".$old);

    mysqli_query($koneksi,
        "UPDATE namasiswa SET nama='$nama', foto='$namaBaru' WHERE id=$id"
    );
} else {
    mysqli_query($koneksi,
        "UPDATE namasiswa SET nama='$nama' WHERE id=$id"
    );
}

echo json_encode([
    "status" => true,
    "message" => "Data berhasil diupdate"
]);
