<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo dari Casting</title>
</head>
<body>

<?php
$teks = "321abc";  // String berisi angka dan huruf
$angka = (int)$teks;  // Hanya angka 321 yang diambil

echo "Tipe sebelum casting: " . gettype($teks) . "<br>";
echo "Tipe sesudah casting: " . gettype($angka) . "<br>";
echo "Nilainya: $angka";
?>

</body>
</html>
