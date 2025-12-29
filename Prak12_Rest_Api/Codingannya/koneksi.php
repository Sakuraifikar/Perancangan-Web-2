<?php
$koneksi = mysqli_connect("localhost:3307", "root", "", "foto");

if (!$koneksi) {
    http_response_code(500);
    echo json_encode([
        "status" => false,
        "message" => "Koneksi database gagal"
    ]);
    exit;
}
