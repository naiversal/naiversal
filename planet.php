<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=2");
    exit();
}

include 'koneksi.php';

$planet_dalam_result = mysqli_query($conn, "SELECT * FROM planet WHERE jenis_planet = 'Dalam' ORDER BY 
    CASE 
        WHEN nama_planet = 'Merkurius' THEN 1
        WHEN nama_planet = 'Venus' THEN 2
        WHEN nama_planet = 'Bumi' THEN 3
        WHEN nama_planet = 'Mars' THEN 4
        ELSE 5
    END");

$planet_luar_result = mysqli_query($conn, "SELECT * FROM planet WHERE jenis_planet = 'Luar' ORDER BY 
    CASE 
        WHEN nama_planet = 'Jupiter' THEN 1
        WHEN nama_planet = 'Saturnus' THEN 2
        WHEN nama_planet = 'Uranus' THEN 3
        WHEN nama_planet = 'Neptunus' THEN 4
        ELSE 5
    END");

if (isset($_GET['planet'])) {
    $planet = htmlspecialchars($_GET['planet']);
    $pesan = "Kau sedang melihat informasi tentang planet: <b>$planet</b>";
} else {
    $pesan = "";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planet - Daftar Planet dan Tata Surya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>
        <span class="typing-container">PLANET-PLANET</span>
    </h1>
    <div class="nav-container">
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="planet.php" class="active">Planet</a></li>
                <li><a href="tata-surya.php">Tata Surya</a></li>
                <li><a href="tentang.php">Tentang</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="header-actions">
            <button id="toggle-dark">🌙 Dark Mode</button>
        </div>
    </div>
</header>

<main>
    <?php if ($pesan): ?>
        <p class="center-message"><?= $pesan ?></p>
    <?php endif; ?>

    <section>
        <h2>Planet Dalam</h2>
        <div class="planet-grid">
            <?php while ($planet = mysqli_fetch_assoc($planet_dalam_result)): ?>
                <article class="card">
                    <?php if ($planet['gambar']): ?>
                        <img src="img/<?= $planet['gambar'] ?>" alt="<?= $planet['nama_planet'] ?>" class="card-img">
                    <?php else: ?>
                        <img src="img/<?= strtolower($planet['nama_planet']) ?>.png" alt="<?= $planet['nama_planet'] ?>" class="card-img">
                    <?php endif; ?>
                    <h3 class="card-title"><?= $planet['nama_planet'] ?></h3>
                    <p class="card-text"><?= $planet['deskripsi'] ?></p>
                </article>
            <?php endwhile; ?>
        </div>
    </section>

    <section>
        <h2>Planet Luar</h2>
        <div class="planet-grid">
            <?php while ($planet = mysqli_fetch_assoc($planet_luar_result)): ?>
                <article class="card">
                    <?php if ($planet['gambar']): ?>
                        <img src="img/<?= $planet['gambar'] ?>" alt="<?= $planet['nama_planet'] ?>" class="card-img">
                    <?php else: ?>
                        <img src="img/<?= strtolower($planet['nama_planet']) ?>.png" alt="<?= $planet['nama_planet'] ?>" class="card-img">
                    <?php endif; ?>
                    <h3 class="card-title"><?= $planet['nama_planet'] ?></h3>
                    <p class="card-text"><?= $planet['deskripsi'] ?></p>
                </article>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<footer>
    <p>Referensi: <a href="http://www.spaceopedia.com/">Spaceopedia</a></p>
    <p>&copy; <?= date("Y"); ?> Sistem Tata Surya</p>
</footer>

<script src="script.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>