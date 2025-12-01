<?php
$host = "localhost:3307"; // kalau MySQL kamu pakai port 3307
$user = "root";
$pass = "";
$db   = "foto";

$koneksi = mysqli_connect("localhost:3307", "root", "", "foto");

if (!$koneksi) {
    die("❌ Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "✅ Koneksi berhasil ke database foto";
}
?>