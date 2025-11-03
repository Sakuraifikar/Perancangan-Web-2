<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM animasi_projects ORDER BY id_project DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Animasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #eef2f8;
      padding: 50px;
    }
    h2 {
      text-align: center;
      color: #333;
      font-size: 26px;
    }
    .tambah {
      display: inline-block;
      background: #28a745;
      color: #fff;
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
      margin-bottom: 20px;
      margin-left: 5%;
    }
    .tambah:hover { background: #1e8f3a; }
    table {
      width: 90%;
      margin: 0 auto;
      border-collapse: collapse;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 14px 16px;
      text-align: center;
      border-bottom: 1px solid #f1f1f1;
    }
    th {
      background: #0066ff;
      color: white;
      font-size: 15px;
    }
    tr:hover { background: #f8fbff; }
    a.btn {
      padding: 6px 12px;
      border-radius: 6px;
      color: white;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
      margin: 0 2px;
      font-size: 13px;
    }
    .edit { background: #ffc107; }
    .hapus { background: #dc3545; }
    .edit:hover { background: #e0a800; }
    .hapus:hover { background: #b02a37; }
  </style>
</head>
<body>
  <h2>📺 Data Animasi</h2>
  <a href="form_animasi.html" class="tambah">+ Tambah Animasi</a>
  <table>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Genre</th>
      <th>Tahun Rilis</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= htmlspecialchars($data['judul']) ?></td>
        <td><?= htmlspecialchars($data['genre']) ?></td>
        <td><?= htmlspecialchars($data['tahun_rilis']) ?></td>
        <td><?= ucfirst(htmlspecialchars($data['status'])) ?></td>
        <td>
          <a href="edit.php?id_project=<?= $data['id_project'] ?>" class="btn edit">✏️ Edit</a>
          <a href="hapus.php?id_project=<?= $data['id_project'] ?>" class="btn hapus" onclick="return confirm('Yakin hapus data ini?')">🗑️ Hapus</a>
        </td>
      </tr>
    <?php $no++; } ?>
  </table>
</body>
</html>
