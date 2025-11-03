<?php
include 'koneksi.php';
$id = $_GET['id_project'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM animasi_projects WHERE id_project='$id'"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Animasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f8;
      display: flex; justify-content: center; align-items: center;
      height: 100vh;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 12px;
      width: 400px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; color: #333; margin-bottom: 20px; }
    label { font-weight: 600; display: block; margin-top: 10px; }
    input, select {
      width: 100%; padding: 10px; border-radius: 8px;
      border: 1px solid #ccc; margin-top: 5px;
    }
    button {
      width: 100%; padding: 12px;
      background: #0066ff; color: white; border: none;
      border-radius: 8px; margin-top: 20px; font-weight: 600;
      cursor: pointer; transition: 0.3s;
    }
    button:hover { background: #004bcc; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Data Animasi</h2>
    <form action="simpan.php" method="POST">
      <input type="hidden" name="id_project" value="<?= $data['id_project'] ?>">

      <label>Judul:</label>
      <input type="text" name="judul" value="<?= $data['judul'] ?>" required>

      <label>Genre:</label>
      <input type="text" name="genre" value="<?= $data['genre'] ?>" required>

      <label>Tahun Rilis:</label>
      <input type="number" name="tahun_rilis" value="<?= $data['tahun_rilis'] ?>" required>

      <label>Status:</label>
      <select name="status" required>
        <option value="upcoming" <?= ($data['status']=="upcoming"?"selected":"") ?>>Upcoming</option>
        <option value="ongoing" <?= ($data['status']=="ongoing"?"selected":"") ?>>Ongoing</option>
        <option value="completed" <?= ($data['status']=="completed"?"selected":"") ?>>Completed</option>
        <option value="hiatus" <?= ($data['status']=="hiatus"?"selected":"") ?>>Hiatus</option>
      </select>

      <button type="submit">Simpan Perubahan</button>
    </form>
  </div>
</body>
</html>
