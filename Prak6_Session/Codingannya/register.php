<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register Akun</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      width: 400px;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    label {
      font-weight: 600;
      display: block;
      margin-top: 10px;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #0066ff;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 15px;
      font-weight: 600;
      margin-top: 20px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background: #004bcc;
    }
    .msg {
      text-align: center;
      padding: 10px;
      margin-top: 15px;
      border-radius: 8px;
      font-size: 14px;
    }
    .success { background: #c8ffdd; color: #0a7a30; }
    .error { background: #ffd4d4; color: #b10000; }
    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }
    .login-link a {
      color: #0066ff;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Daftar Akun Baru</h2>

    <?php if(isset($_GET['msg'])): ?>
      <div class="msg <?= $_GET['type'] ?>">
        <?= htmlspecialchars($_GET['msg']); ?>
      </div>
    <?php endif; ?>

    <form action="register_process.php" method="POST">
      <label>Username</label>
      <input type="text" name="username" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <label>Konfirmasi Password</label>
      <input type="password" name="confirm_password" required>

      <button type="submit">Daftar</button>
    </form>

    <div class="login-link">
      Sudah punya akun? <a href="login.php">Login di sini</a>
    </div>
  </div>

</body>
</html>
