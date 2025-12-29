<?php
header("Content-Type: application/json");
include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT foto FROM namasiswa WHERE id=$id");
$foto = mysqli_fetch_assoc($data)['foto'];

unlink("../gambar/".$foto);
mysqli_query($koneksi, "DELETE FROM namasiswa WHERE id=$id");

echo json_encode([
    "status" => true,
    "message" => "Data berhasil dihapus"
]);
