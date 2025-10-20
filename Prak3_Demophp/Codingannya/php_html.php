<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo PHP dan HTML</title>
</head>
<body>

<h1>Berikut Contoh Kombinasi HTML dan PHP</h1>

<?php
echo "Ini adalah teks dari Php!<br>";
echo "Hari ini tanggal: " . date("d-m-Y") . "<br>";
?>

<p>Ini paragraf HTML yang biasanya.</p>

<?php
$nama = "Fikar";
echo "Nama saya adalah $nama.";
?>

</body>
</html>
