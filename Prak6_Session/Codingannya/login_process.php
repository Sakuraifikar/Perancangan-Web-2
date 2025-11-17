<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    header("Location: index.php");
    exit;

} else {
    echo "<script>alert('Login gagal! Username atau password salah.');location='login.php';</script>";
}
?>
