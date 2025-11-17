<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "db_animasi";
$port = 3307;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
