<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "inayah" && $password === "123") {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <div class="login-container">
        <div class="glass">
            <h2>Login</h2>
            <form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
            </form>

            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div class="error">Username atau password salah.</div>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] == 2): ?>
                <div class="error">Silakan login terlebih dahulu untuk mengakses Dashboard.</div>
            <?php endif; ?>

            <?php if (isset($_GET['message']) && $_GET['message'] == 'logout'): ?>
                <div class="success">Anda berhasil logout.</div>
            <?php endif; ?>

            <div class="back-link">
                <a href="index.php">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
