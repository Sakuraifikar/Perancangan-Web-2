<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Animasi</title>
<style>
    body { font-family: Poppins, sans-serif; background: #f5f7fa; padding: 40px; }
    h1 { text-align:center; }
    a {
        display:inline-block; background:#0066ff; padding:10px 15px;
        text-decoration:none; color:white; border-radius:6px; margin:10px;
    }
</style>
</head>
<body>

<h1>Selamat Datang, <?= $_SESSION['username'] ?></h1>

<div style="text-align:center;">
    <a href="tampil_animasi.php">📺 Kelola Animasi</a>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
