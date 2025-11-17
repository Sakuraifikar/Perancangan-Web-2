<?php
include "koneksi.php";

$username = "fikar";      // username yang mau diubah
$passwordBaru = "fik123";   // password baru

$hash = password_hash($passwordBaru, PASSWORD_BCRYPT);

mysqli_query($conn, "UPDATE users SET password='$hash' WHERE username='$username'");

echo "Password berhasil diubah!";
?>
