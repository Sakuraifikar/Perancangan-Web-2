<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "db_animasi";
$port = 3307; // ubah ke 3306 jika MySQL kamu pakai port default

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// Tidak perlu echo, agar tidak mengganggu tampilan halaman lain
?>
