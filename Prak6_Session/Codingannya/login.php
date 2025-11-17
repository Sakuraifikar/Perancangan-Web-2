<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin Animasi</title>
<style>
    body {
        font-family: Poppins, sans-serif;
        background: #e9f0ff;
        display: flex; justify-content: center; align-items: center;
        height: 100vh;
    }
    .login-box {
        width: 350px; background: white; padding: 30px;
        border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    input {
        width: 100%; padding: 10px; margin-top: 10px;
        border: 1px solid #ccc; border-radius: 6px;
    }
    button {
        margin-top: 20px; width: 100%; padding: 10px;
        background: #0066ff; border: none; color: white; cursor: pointer;
        border-radius: 6px; font-weight: bold;
    }
</style>
</head>
<body>

<div class="login-box">
    <h2 style="text-align:center;">Login Admin Animasi</h2>

    <form action="login_process.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    
<div class="login-link">
  Belum punya akun? <a href="register.php">Daftar di sini</a>
</div>

</div>

</body>
</html>
