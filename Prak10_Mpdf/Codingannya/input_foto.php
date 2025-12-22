<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
</head>
<body>

<h2>Form Upload Foto</h2>

<form action="proses.php" method="POST" enctype="multipart/form-data">
    Nama: <input type="text" name="nama"><br><br>
    Foto: <input type="file" name="foto"><br><br>
    <button type="submit">Upload</button>
</form>

</body>
</html>
