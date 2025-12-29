<?php
header("Content-Type: application/json");
include "../koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM foto_api");

$hasil = [];
while ($row = mysqli_fetch_assoc($data)) {
    $row['foto_url'] = "http://localhost/foto_api/gambar/".$row['foto'];
    $hasil[] = $row;
}

echo json_encode([
    "status" => true,
    "data" => $hasil
]);
