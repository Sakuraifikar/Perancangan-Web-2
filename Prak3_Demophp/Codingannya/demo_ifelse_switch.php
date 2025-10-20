<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo dari If Else</title>
</head>
<body>

<?php
$nilai = 90;

if ($nilai >= 90) {
    echo "Nilai A (Sangat Baik)";
} elseif ($nilai >= 75) {
    echo "Nilai B (Baik)";
} elseif ($nilai >= 60) {
    echo "Nilai C (Cukup)";
} else {
    echo "Nilai D (Kurang)";
}
?>

<hr>

<?php
// Contoh sama dengan switch
$hari = "Minggu";

switch ($hari) {
    case "Senin": echo "Hari ini adalah Hari Senin"; break;
    case "Selasa": echo "Hari ini adalah Hari Selasa"; break;
    case "Rabu": echo "Hari ini adalah Hari Rabu"; break;
    case "Kamis": echo "Hari ini adalah Hari Kamis"; break;
    case "Selasa": echo "Hari ini adalah Hari Jum'at"; break;
    case "Sabtu": echo "Hari ini adalah Hari Sabtu"; break;
    case "Minggu": echo "Hari ini adalah Hari Minggu"; break;
    default: echo "Hari tidak diketahui";
}
?>

</body>
</html>
