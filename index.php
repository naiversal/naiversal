<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Planet dan Tata Surya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>
            <span class="typing-container">SISTEM TATA SURYA</span>
        </h1>
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="index.php" class="active">Beranda</a></li>
                    <li><a href="planet.php">Planet</a></li>
                    <li><a href="tata-surya.php">Tata Surya</a></li>
                    <li><a href="tentang.php">Tentang</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <button id="toggle-dark">🌙 Dark Mode</button>
            </div>
        </div>
    </header>

    <main>
        <section>
            <h2>Selamat Datang di Portal Tata Surya</h2>
            <p class="intro-text">
                Jelajahi keajaiban alam semesta dan pelajari tentang planet-planet yang menakjubkan dalam sistem tata surya kita.
            </p>
        </section>

        <section>
            <h2>Eksplorasi</h2>
            <div class="planet-grid">
                <article class="card">
                    <h3 class="card-title">PLANET-PLANET</h3>
                    <p class="card-text">Pelajari tentang 8 planet dalam tata surya, dari Merkurius hingga Neptunus.</p>
                </article>

                <article class="card">
                    <h3 class="card-title">SISTEM TATA SURYA</h3>
                    <p class="card-text">Temukan fakta menarik tentang matahari, bulan, asteroid, dan benda langit lainnya.</p>
                </article>
            </div>
        </section>

        <section>
            <h2>Fakta Menarik</h2>
            <div class="planet-grid">
                <article class="card">
                    <p class="card-text">Tata surya kita berumur sekitar 4.6 miliar tahun</p>
                </article>
                <article class="card">
                    <p class="card-text">Jupiter adalah planet terbesar dengan massa 2.5 kali semua planet lain digabungkan</p>
                </article>
                <article class="card">
                    <p class="card-text">Satu hari di Venus lebih lama dari satu tahunnya</p>
                </article>
                <article class="card">
                    <p class="card-text">Saturnus bisa mengapung di air karena kepadatannya lebih rendah</p>
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