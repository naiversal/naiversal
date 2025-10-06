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
    <title>Tentang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Tentang</h1>
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
        <h2>Tentang Website</h2>
        <div class="card about-card">
            <p class="card-text">
                Website ini dibuat untuk memberikan informasi tentang Tata Surya dengan tampilan interaktif dan modern.
            </p>
            <p class="card-text">
                Anda dapat menjelajahi informasi planet, tata surya, serta mempelajari berbagai fakta menarik lainnya.
            </p>
            <p class="card-text">
                Sistem ini dilengkapi fitur login sederhana untuk melindungi halaman-halaman tertentu.
            </p>
        </div>
    </section>
</main>

<footer>
    <p>Referensi: <a href="http://www.spaceopedia.com/">Spaceopedia</a></p>
</footer>

<script src="script.js"></script>
</body>
</html>
