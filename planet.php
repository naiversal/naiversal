<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=2");
    exit();
}

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
    <h1>Planet-Planet dalam Tata Surya</h1>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="planet.php" class="active">Planet</a></li>
            <li><a href="tata-surya.php">Tata Surya</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <button id="toggle-dark">🌙 Dark Mode</button>
</header>

<main>
    <?php if ($pesan): ?>
        <p style="text-align:center; color:#ffd369; font-weight:bold;"><?= $pesan ?></p>
    <?php endif; ?>

    <section>
        <h2>Planet Dalam (Terrestrial)</h2>
        <div class="planet-grid">
            <article class="card">
                <img src="img/merkurius.png" alt="Merkurius" class="card-img">
                <h3 class="card-title"><a href="?planet=Merkurius">Merkurius</a></h3>
                <p class="card-text">
                    Planet terdekat dari Matahari dengan permukaan penuh kawah dan suhu ekstrem.
                </p>
            </article>

            <article class="card">
                <img src="img/venus.png" alt="Venus" class="card-img">
                <h3 class="card-title"><a href="?planet=Venus">Venus</a></h3>
                <p class="card-text">
                    Planet terpanas dalam tata surya dengan atmosfer tebal.
                </p>
            </article>

            <article class="card">
                <img src="img/bumi.png" alt="Bumi" class="card-img">
                <h3 class="card-title"><a href="?planet=Bumi">Bumi</a></h3>
                <p class="card-text">
                    Satu-satunya planet yang diketahui memiliki kehidupan.
                </p>
            </article>

            <article class="card">
                <img src="img/mars.png" alt="Mars" class="card-img">
                <h3 class="card-title"><a href="?planet=Mars">Mars</a></h3>
                <p class="card-text">
                    Planet merah dengan bukti adanya air di masa lalu.
                </p>
            </article>
        </div>
    </section>

    <section>
        <h2>Planet Luar (Gas Giant)</h2>
        <div class="planet-grid">
            <article class="card">
                <img src="img/jupiter.png" alt="Jupiter" class="card-img">
                <h3 class="card-title"><a href="?planet=Jupiter">Jupiter</a></h3>
                <p class="card-text">
                    Planet terbesar dalam tata surya dengan badai raksasa yang dikenal sebagai Bintik Merah Besar.
                </p>
            </article>

            <article class="card">
                <img src="img/saturnus.png" alt="Saturnus" class="card-img">
                <h3 class="card-title"><a href="?planet=Saturnus">Saturnus</a></h3>
                <p class="card-text">
                    Planet dengan sistem cincin yang spektakuler terbuat dari es dan batuan.
                </p>
            </article>

            <article class="card">
                <img src="img/uranus.png" alt="Uranus" class="card-img">
                <h3 class="card-title"><a href="?planet=Uranus">Uranus</a></h3>
                <p class="card-text">
                    Planet es raksasa yang berotasi miring hampir 98 derajat.
                </p>
            </article>

            <article class="card">
                <img src="img/neptunus.png" alt="Neptunus" class="card-img">
                <h3 class="card-title"><a href="?planet=Neptunus">Neptunus</a></h3>
                <p class="card-text">
                    Planet terjauh dengan angin terkencang dalam tata surya.
                </p>
            </article>
        </div>
    </section>
</main>

<footer>
    <p>Referensi: <a href="http://www.spaceopedia.com/">Spaceopedia</a></p>
</footer>

<script src="script.js"></script>
</body>
</html>
