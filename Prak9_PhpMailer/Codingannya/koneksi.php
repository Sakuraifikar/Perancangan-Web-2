<?php
$koneksi = mysqli_connect("localhost:3307", "root", "", "db_alert");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
