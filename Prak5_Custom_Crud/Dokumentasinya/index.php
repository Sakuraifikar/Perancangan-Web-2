<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Animasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      background: #eef2f8;
      color: #333;
      height: 100vh;
    }
    /* Sidebar */
    .sidebar {
      width: 250px;
      background: linear-gradient(180deg, #0066ff, #004bcc);
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 25px;
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 22px;
    }
    .menu a {
      display: block;
      color: #fff;
      text-decoration: none;
      padding: 12px 15px;
      margin: 5px 0;
      border-radius: 8px;
      transition: 0.3s;
    }
    .menu a:hover {
      background: rgba(255,255,255,0.2);
    }
    .footer {
      text-align: center;
      font-size: 12px;
      opacity: 0.8;
    }
    /* Content */
    .content {
      flex: 1;
      padding: 40px;
    }
    header {
      background: white;
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      font-size: 22px;
      color: #333;
    }
    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 25px;
      margin-top: 40px;
    }
    .card {
      background: white;
      flex: 1 1 280px;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      text-align: center;
      transition: 0.3s;
    }
    .card:hover { transform: translateY(-5px); }
    .card h3 { color: #0066ff; margin-bottom: 10px; }
    .card p { color: #666; font-size: 14px; margin-bottom: 15px; }
    .btn {
      background: #0066ff;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn:hover { background: #004bcc; }
  </style>
</head>
<body>
  <div class="sidebar">
    <div>
      <h2>🎬 Database Animasi Fikar</h2>
      <div class="menu">
        <a href="index.php">🏠 Dashboard</a>
        <a href="tampil_animasi.php">📺 Data Animasi</a>
        <a href="form_animasi.html">➕ Tambah Data</a>
      </div>
    </div>
    <div class="footer">
      &copy; <?= date('Y'); ?> Database Animasi
    </div>
  </div>

  <div class="content">
    <header>
      <h1>Selamat Datang di Dashboard Database Animasi</h1>
      <span>Admin Panel</span>
    </header>

    <div class="card-container">
      <div class="card">
        <h3>📺 Data Animasi</h3>
        <p>Kelola daftar animasi dengan mudah dan cepat.</p>
        <a href="tampil_animasi.php" class="btn">Lihat Data</a>
      </div>

      <div class="card">
        <h3>📊 Statistik</h3>
        <p>Lihat jumlah animasi berdasarkan status dan genre.</p>
        <a href="#" class="btn">Lihat Statistik</a>
      </div>

      <div class="card">
        <h3>⚙️ Pengaturan</h3>
        <p>Atur konfigurasi dan informasi database.</p>
        <a href="#" class="btn">Atur Sekarang</a>
      </div>
    </div>
  </div>
</body>
</html>
