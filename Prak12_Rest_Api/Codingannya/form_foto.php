<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Foto (REST API)</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }
        .box {
            width: 400px;
            margin: 60px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0,0,0,.2);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button {
            background: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        a {
            display: block;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="box">
    <h2 align="center">Upload Foto</h2>

    <form action="api/foto_create.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="file" name="foto" required>
        <button type="submit">Upload</button>
    </form>

    <a href="api/foto_read.php" target="_blank">
        🔗 Lihat REST API (JSON)
    </a>
</div>

</body>
</html>
