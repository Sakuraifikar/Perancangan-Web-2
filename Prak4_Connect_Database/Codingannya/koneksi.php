<?php
$host = "127.0.0.1"; // gunakan IP langsung
$user = "root";
$pass = "";
$db   = "db_animasi";
$port = 3307; // karena MySQL kamu berjalan di port 3307

// Koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil ke database!<br>";
}

// Ambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $status = $_POST['status'];

    // Query simpan data
    $query = "INSERT INTO animasi_projects (judul, genre, tahun_rilis, status)
              VALUES ('$judul', '$genre', '$tahun_rilis', '$status')";

    if (mysqli_query($conn, $query)) {
        echo "<h3>Data animasi berhasil disimpan!</h3>";
        echo "<a href='form_animasi.html'>Kembali ke Form</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Tutup koneksi
mysqli_close($conn);
?>
