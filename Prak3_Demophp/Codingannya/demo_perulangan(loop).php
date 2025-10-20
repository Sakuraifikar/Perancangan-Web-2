<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo dari Loop</title>
</head>
<body>

<?php
// WHILE
$i = 0;
echo "<b>While Loop:</b><br>";
while ($i <= 10) {
    echo $i . " ";
    $i++;
}

// DO-WHILE
$j = 0;
echo "<br><br><b>Do While Loop:</b><br>";
do {
    echo $j . " ";
    $j++;
} while ($j <= 10);

// FOR
echo "<br><br><b>For Loop:</b><br>";
for ($k = 0; $k <= 10; $k++) {
    echo $k . " ";
}

// FOREACH
echo "<br><br><b>Foreach Loop:</b><br>";
$angka = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
foreach ($angka as $value) {
    echo $value . " ";
}
?>

</body>
</html>
