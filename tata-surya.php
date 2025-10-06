<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=2");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Surya - Daftar Planet dan Tata Surya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sistem Tata Surya</h1>
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
            <h2>Pusat Tata Surya</h2>
            <div class="planet-grid">
                <article class="card">
                    <h3 class="card-title">MATAHARI</h3>
                    <p class="card-text">Bintang di pusat tata surya yang menyediakan energi dan cahaya untuk semua planet. Terdiri dari 73% hidrogen dan 25% helium dengan suhu inti mencapai 15 juta derajat Celsius.</p>
                </article>
            </div>
        </section>

        <section>
            <h2>Satelit dan Bulan</h2>
            <div class="planet-grid">
                <article class="card">
                    <h3 class="card-title">BULAN (SATELIT BUMI)</h3>
                    <p class="card-text">Satelit alami Bumi yang mempengaruhi pasang surut laut. Terbentuk sekitar 4.5 miliar tahun yang lalu dan memiliki diameter seperempat dari Bumi.</p>
                </article>

                <article class="card">
                    <h3 class="card-title">SATELIT GALILEAN JUPITER</h3>
                    <p class="card-text">Empat satelit terbesar Jupiter: Io (vulkanik aktif), Europa (lautan di bawah es), Ganymede (terbesar di tata surya), dan Callisto (penuh kawah).</p>
                </article>

                <article class="card">
                    <h3 class="card-title">TITAN (SATELIT SATURNUS)</h3>
                    <p class="card-text">Satelit terbesar Saturnus dengan atmosfer tebal dan danau metana cair di permukaannya.</p>
                </article>
            </div>
        </section>

        <section>
            <h2>Benda Langit Lainnya</h2>
            <div class="planet-grid">
                <article class="card">
                    <h3 class="card-title">SABUK ASTEROID</h3>
                    <p class="card-text">Wilayah antara Mars dan Jupiter yang berisi ribuan asteroid. Asteroid terbesar adalah Ceres yang juga diklasifikasikan sebagai planet kerdil.</p>
                </article>

                <article class="card">
                    <h3 class="card-title">KOMET</h3>
                    <p class="card-text">Benda es dan debu yang berasal dari pinggiran tata surya. Ketika mendekati matahari, es mencair dan membentuk ekor yang indah.</p>
                </article>

                <article class="card">
                    <h3 class="card-title">SABUK KUIPER</h3>
                    <p class="card-text">Wilayah di luar Neptunus yang berisi benda-benda es termasuk Pluto, Eris, dan Makemake. Sumber komet berperiode pendek.</p>
                </article>

                <article class="card">
                    <h3 class="card-title">PLANET KERDIL</h3>
                    <p class="card-text">Benda langit yang mengorbit matahari tapi tidak dominan di orbitnya. Contoh: Pluto, Ceres, Eris, Haumea, dan Makemake.</p>
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
