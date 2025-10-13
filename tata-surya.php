<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=2");
    exit();
}

include 'koneksi.php';

$bendalangit_result = mysqli_query($conn, "SELECT * FROM bendalangit ORDER BY 
    CASE jenis_objek 
        WHEN 'Pusat Tata Surya' THEN 1
        WHEN 'Bulan' THEN 2
        WHEN 'Satelit' THEN 3
        WHEN 'Planet Kerdil' THEN 4
        WHEN 'Benda Langit Lainnya' THEN 5
        ELSE 6
    END, nama_objek");

$bendalangit = [];
while ($benda = mysqli_fetch_assoc($bendalangit_result)) {
    $bendalangit[] = $benda;
}

function filterByJenis($bendalangit, $jenis) {
    return array_filter($bendalangit, function($benda) use ($jenis) {
        return $benda['jenis_objek'] === $jenis;
    });
}

$pusat_tata_surya = filterByJenis($bendalangit, 'Pusat Tata Surya');
$bulan = filterByJenis($bendalangit, 'Bulan');
$satelit = filterByJenis($bendalangit, 'Satelit');
$planet_kerdil = filterByJenis($bendalangit, 'Planet Kerdil');
$benda_lainnya = filterByJenis($bendalangit, 'Benda Langit Lainnya');
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
        <h1>BENDA LANGIT</h1>
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="planet.php">Planet</a></li>
                    <li><a href="tata-surya.php" class="active">Tata Surya</a></li>
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
        <?php if (!empty($pusat_tata_surya)): ?>
        <section>
            <h2>Pusat Tata Surya</h2>
            <div class="planet-grid">
                <?php foreach ($pusat_tata_surya as $benda): ?>
                <article class="card">
                    <?php if ($benda['gambar']): ?>
                        <img src="img/<?= $benda['gambar'] ?>" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php else: ?>
                        <img src="img/matahari.png" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php endif; ?>
                    <h3 class="card-title"><?= $benda['nama_objek'] ?></h3>
                    <p class="card-text"><?= $benda['deskripsi'] ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($bulan)): ?>
        <section>
            <h2>Bulan</h2>
            <div class="planet-grid">
                <?php foreach ($bulan as $benda): ?>
                <article class="card">
                    <?php if ($benda['gambar']): ?>
                        <img src="img/<?= $benda['gambar'] ?>" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php else: ?>
                        <img src="img/bulan.png" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php endif; ?>
                    <h3 class="card-title"><?= $benda['nama_objek'] ?></h3>
                    <p class="card-text"><?= $benda['deskripsi'] ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($satelit)): ?>
        <section>
            <h2>Satelit</h2>
            <div class="planet-grid">
                <?php foreach ($satelit as $benda): ?>
                <article class="card">
                    <?php if ($benda['gambar']): ?>
                        <img src="img/<?= $benda['gambar'] ?>" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php else: ?>
                        <div class="fallback-img">No Image</div>
                    <?php endif; ?>
                    <h3 class="card-title"><?= $benda['nama_objek'] ?></h3>
                    <p class="card-text"><?= $benda['deskripsi'] ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($planet_kerdil)): ?>
        <section>
            <h2>Planet Kerdil</h2>
            <div class="planet-grid">
                <?php foreach ($planet_kerdil as $benda): ?>
                <article class="card">
                    <?php if ($benda['gambar']): ?>
                        <img src="img/<?= $benda['gambar'] ?>" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php else: ?>
                        <img src="img/pluto.png" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php endif; ?>
                    <h3 class="card-title"><?= $benda['nama_objek'] ?></h3>
                    <p class="card-text"><?= $benda['deskripsi'] ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($benda_lainnya)): ?>
        <section>
            <h2>Benda Langit Lainnya</h2>
            <div class="planet-grid">
                <?php foreach ($benda_lainnya as $benda): ?>
                <article class="card">
                    <?php if ($benda['gambar']): ?>
                        <img src="img/<?= $benda['gambar'] ?>" alt="<?= $benda['nama_objek'] ?>" class="card-img">
                    <?php else: ?>
                        <div class="fallback-img">No Image</div>
                    <?php endif; ?>
                    <h3 class="card-title"><?= $benda['nama_objek'] ?></h3>
                    <p class="card-text"><?= $benda['deskripsi'] ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>

    <footer>
        <p>Referensi: <a href="http://www.spaceopedia.com/">Spaceopedia</a></p>
    </footer>
    
<script src="script.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>