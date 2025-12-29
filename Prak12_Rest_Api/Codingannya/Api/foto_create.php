<?php
header("Content-Type: application/json");
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status"=>false,"message"=>"Method tidak diizinkan"]);
    exit;
}

$nama = $_POST['nama'];
$file = $_FILES['foto'];

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$valid = ['jpg','jpeg','png','gif'];

if (!in_array($ext, $valid)) {
    echo json_encode(["status"=>false,"message"=>"Ekstensi tidak valid"]);
    exit;
}

$namaFile = rand(1000,999999).".".$ext;
move_uploaded_file($file['tmp_name'], "../gambar/".$namaFile);

mysqli_query($koneksi,
    "INSERT INTO foto_api VALUES (NULL,'$nama','$namaFile',NOW())"
);

echo json_encode([
    "status" => true,
    "message" => "Upload berhasil"
]);
