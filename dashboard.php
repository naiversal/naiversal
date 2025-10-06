<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=2");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Tata Surya Dashboard</h1>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="planet.php">Planet</a></li>
            <li><a href="tata-surya.php">Tata Surya</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <button id="toggle-dark">🌙 Dark Mode</button>
</header>

<main>
    <section>
        <h2>Selamat Datang</h2>
        <p class="intro-text">
            Halo, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>.  
            Anda berhasil login ke sistem Tata Surya.  
            Gunakan menu di atas untuk menjelajahi konten.
        </p>
    </section>
</main>

<footer>
    <p>Referensi: <a href="http://www.spaceopedia.com/">Spaceopedia</a></p>
</footer>
    
<script src="script.js"></script>
</body>
</html>
