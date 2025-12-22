<?php
include('koneksi.php');

// Validasi nama
if (empty($_POST['nama'])) {
    echo "Nama masih kosong<br><a href='input_foto.php'>Kembali</a>";
    exit;
}

$nama = $_POST['nama'];

// Folder upload
$direktori = "gambar/";

// Cek apakah folder ada
if (!is_dir($direktori)) {
    mkdir($direktori, 0777, true); // buat folder jika tidak ada
}

// Ambil data file
$file = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$ukuran = $_FILES['foto']['size'];

// Mendapatkan ekstensi
$ekstensi = strtolower(pathinfo($file, PATHINFO_EXTENSION));

// Format ekstensi yang diperbolehkan
$valid = array('jpg','jpeg','png','gif');

// Validasi ekstensi
if (!in_array($ekstensi, $valid)) {
    echo "Ekstensi tidak diperbolehkan<br><a href='input_foto.php'>Kembali</a>";
    exit;
}

// Validasi ukuran (maks 1MB)
if ($ukuran > 1000000) {
    echo "Ukuran gambar terlalu besar (maks 1MB)<br><a href='input_foto.php'>Kembali</a>";
    exit;
}

// Generate nama file baru
$namaBaru = rand(1000, 1000000) . "." . $ekstensi;

// Upload file
if (move_uploaded_file($tmp, $direktori . $namaBaru)) {

    // Query simpan
    $query = "INSERT INTO foto VALUES (NULL, '$nama', '$namaBaru')";

    if (mysqli_query($koneksi, $query)) {
        echo "Berhasil disimpan<br>";
        echo "Nama: $nama <br>";
        echo "<img src='gambar/$namaBaru' height='200'><br>";
        echo "<br><a href='tampil_foto.php'>Lihat Halaman Berikutnya</a>";
    } else {
        echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
    }

} else {
    echo "Gagal upload file<br><a href='input_foto.php'>Kembali</a>";
}
?>
