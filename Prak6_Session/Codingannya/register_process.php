<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$confirm  = $_POST['confirm_password'];

// Cek password cocok
if($password !== $confirm){
    header("Location: register.php?msg=Konfirmasi password tidak cocok&type=error");
    exit;
}

// Cek apakah username sudah digunakan
$cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if(mysqli_num_rows($cek) > 0){
    header("Location: register.php?msg=Username sudah digunakan&type=error");
    exit;
}

// Hash password sebelum simpan
$hash = password_hash($password, PASSWORD_BCRYPT);

// Simpan user baru
mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$hash')");

header("Location: register.php?msg=Akun berhasil dibuat&type=success");
exit;
?>
