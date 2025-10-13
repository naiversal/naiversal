<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=2");
    exit();
}

include 'koneksi.php';

function uploadGambar($file, $folder = 'img/') {
    $namaFile = $file['name'];
    $ukuranFile = $file['size'];
    $error = $file['error'];
    $tmpName = $file['tmp_name'];
    
    if ($error === 4) {
        return false;
    }
    
    $ekstensiValid = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    
    if (!in_array($ekstensiFile, $ekstensiValid)) {
        return false;
    }
    
    if ($ukuranFile > 2000000) {
        return false;
    }
    
    $namaFileBaru = uniqid() . '.' . $ekstensiFile;
    $tujuan = $folder . $namaFileBaru;
    
    if (move_uploaded_file($tmpName, $tujuan)) {
        return $namaFileBaru;
    } else {
        error_log("Upload failed: " . $tmpName . " to " . $tujuan);
        return false;
    }
}

if (isset($_POST['tambah_planet'])) {
    $nama_planet = mysqli_real_escape_string($conn, $_POST['nama_planet']);
    $jenis_planet = mysqli_real_escape_string($conn, $_POST['jenis_planet']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    
    $gambar = uploadGambar($_FILES['gambar']);
    if (!$gambar && $_FILES['gambar']['error'] !== 4) {
        $pesan_error = "Gagal mengupload gambar! Pastikan file adalah JPG, PNG, atau GIF dan ukuran max 2MB.";
    } else {
        $sql = "INSERT INTO planet (nama_planet, jenis_planet, deskripsi, gambar) 
                VALUES ('$nama_planet', '$jenis_planet', '$deskripsi', '$gambar')";
        
        if (mysqli_query($conn, $sql)) {
            $pesan_sukses = "Planet berhasil ditambahkan!";
        } else {
            $pesan_error = "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['edit_planet'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama_planet = mysqli_real_escape_string($conn, $_POST['nama_planet']);
    $jenis_planet = mysqli_real_escape_string($conn, $_POST['jenis_planet']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    
    if ($_FILES['gambar']['error'] !== 4) {
        $gambar = uploadGambar($_FILES['gambar']);
        if (!$gambar) {
            $pesan_error = "Gagal mengupload gambar! Pastikan file adalah JPG, PNG, atau GIF dan ukuran max 2MB.";
        } else {
            $sql = "UPDATE planet SET 
                    nama_planet='$nama_planet', 
                    jenis_planet='$jenis_planet', 
                    deskripsi='$deskripsi', 
                    gambar='$gambar' 
                    WHERE id=$id";
        }
    } else {
        $sql = "UPDATE planet SET 
                nama_planet='$nama_planet', 
                jenis_planet='$jenis_planet', 
                deskripsi='$deskripsi'
                WHERE id=$id";
    }
    
    if (!isset($pesan_error)) {
        if (mysqli_query($conn, $sql)) {
            $pesan_sukses = "Planet berhasil diupdate!";
        } else {
            $pesan_error = "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_GET['hapus_planet'])) {
    $id = mysqli_real_escape_string($conn, $_GET['hapus_planet']);
    
    $result = mysqli_query($conn, "SELECT gambar FROM planet WHERE id=$id");
    $planet = mysqli_fetch_assoc($result);
    if ($planet['gambar'] && file_exists('img/' . $planet['gambar'])) {
        unlink('img/' . $planet['gambar']);
    }
    
    $sql = "DELETE FROM planet WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        $pesan_sukses = "Planet berhasil dihapus!";
    } else {
        $pesan_error = "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['tambah_bendalangit'])) {
    $nama_objek = mysqli_real_escape_string($conn, $_POST['nama_objek']);
    $jenis_objek = mysqli_real_escape_string($conn, $_POST['jenis_objek']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi_benda']);
    
    $gambar = uploadGambar($_FILES['gambar_benda']);
    if (!$gambar && $_FILES['gambar_benda']['error'] !== 4) {
        $pesan_error = "Gagal mengupload gambar! Pastikan file adalah JPG, PNG, atau GIF dan ukuran max 2MB.";
    } else {
        $sql = "INSERT INTO bendalangit (nama_objek, jenis_objek, deskripsi, gambar) 
                VALUES ('$nama_objek', '$jenis_objek', '$deskripsi', '$gambar')";
        
        if (mysqli_query($conn, $sql)) {
            $pesan_sukses = "Benda langit berhasil ditambahkan!";
        } else {
            $pesan_error = "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['edit_bendalangit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id_benda']);
    $nama_objek = mysqli_real_escape_string($conn, $_POST['nama_objek']);
    $jenis_objek = mysqli_real_escape_string($conn, $_POST['jenis_objek']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi_benda']);
    
    if ($_FILES['gambar_benda']['error'] !== 4) {
        $gambar = uploadGambar($_FILES['gambar_benda']);
        if (!$gambar) {
            $pesan_error = "Gagal mengupload gambar! Pastikan file adalah JPG, PNG, atau GIF dan ukuran max 2MB.";
        } else {
            $sql = "UPDATE bendalangit SET 
                    nama_objek='$nama_objek', 
                    jenis_objek='$jenis_objek', 
                    deskripsi='$deskripsi', 
                    gambar='$gambar' 
                    WHERE id=$id";
        }
    } else {
        $sql = "UPDATE bendalangit SET 
                nama_objek='$nama_objek', 
                jenis_objek='$jenis_objek', 
                deskripsi='$deskripsi'
                WHERE id=$id";
    }
    
    if (!isset($pesan_error)) {
        if (mysqli_query($conn, $sql)) {
            $pesan_sukses = "Benda langit berhasil diupdate!";
        } else {
            $pesan_error = "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_GET['hapus_bendalangit'])) {
    $id = mysqli_real_escape_string($conn, $_GET['hapus_bendalangit']);
    
    $result = mysqli_query($conn, "SELECT gambar FROM bendalangit WHERE id=$id");
    $benda = mysqli_fetch_assoc($result);
    if ($benda['gambar'] && file_exists('img/' . $benda['gambar'])) {
        unlink('img/' . $benda['gambar']);
    }
    
    $sql = "DELETE FROM bendalangit WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        $pesan_sukses = "Benda langit berhasil dihapus!";
    } else {
        $pesan_error = "Error: " . mysqli_error($conn);
    }
}

$planet_result = mysqli_query($conn, "SELECT * FROM planet ORDER BY id DESC");
$bendalangit_result = mysqli_query($conn, "SELECT * FROM bendalangit ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - CRUD Tata Surya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>DASHBOARD</h1>
    <div class="nav-container">
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="planet.php">Planet</a></li>
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

<main class="dashboard-main">
    <section>
        <h2>Selamat Datang</h2>
        <p class="intro-text">
            Halo, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>.  
            Anda berhasil login ke sistem Tata Surya.  
            Gunakan menu di atas untuk menjelajahi konten.
        </p>
    </section>

    <?php if (isset($pesan_sukses)): ?>
        <div class="dashboard-message message-success"><?= $pesan_sukses ?></div>
    <?php endif; ?>
    
    <?php if (isset($pesan_error)): ?>
        <div class="dashboard-message message-error"><?= $pesan_error ?></div>
    <?php endif; ?>

    <section class="dashboard-section">
        <div class="section-header">
            <h2><?= isset($_GET['edit_planet']) ? 'Edit Planet' : 'Tambah Planet Baru' ?></h2>
            <span class="badge">Form</span>
        </div>
        
        <?php
        $edit_data = null;
        if (isset($_GET['edit_planet'])) {
            $id = $_GET['edit_planet'];
            $result = mysqli_query($conn, "SELECT * FROM planet WHERE id=$id");
            $edit_data = mysqli_fetch_assoc($result);
        }
        ?>
        
        <form method="POST" action="dashboard.php" enctype="multipart/form-data" class="compact-form">
            <?php if ($edit_data): ?>
                <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label>Nama Planet:</label>
                <input type="text" name="nama_planet" value="<?= $edit_data ? $edit_data['nama_planet'] : '' ?>" required>
            </div>
            
            <div class="form-group">
                <label>Jenis Planet:</label>
                <select name="jenis_planet" required>
                    <option value="Dalam" <?= $edit_data && $edit_data['jenis_planet'] == 'Dalam' ? 'selected' : '' ?>>Dalam</option>
                    <option value="Luar" <?= $edit_data && $edit_data['jenis_planet'] == 'Luar' ? 'selected' : '' ?>>Luar</option>
                </select>
            </div>
            
            <div class="form-group full-width">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" rows="3" required><?= $edit_data ? $edit_data['deskripsi'] : '' ?></textarea>
            </div>
            
            <div class="form-group full-width">
                <label>Gambar:</label>
                <div class="file-input-wrapper">
                    <div class="file-input-label">
                        <?= $edit_data && $edit_data['gambar'] ? 'Ganti Gambar' : 'Pilih Gambar' ?>
                    </div>
                    <input type="file" name="gambar" accept="image/*" <?= !$edit_data ? 'required' : '' ?>>
                </div>
                <?php if ($edit_data && $edit_data['gambar']): ?>
                    <small>Gambar saat ini: <?= $edit_data['gambar'] ?></small>
                <?php endif; ?>
            </div>
            
            <div class="form-actions">
                <?php if ($edit_data): ?>
                    <button type="submit" name="edit_planet" class="btn-compact btn-warning">Update Planet</button>
                    <a href="dashboard.php" class="btn-compact btn-danger">Batal</a>
                <?php else: ?>
                    <button type="submit" name="tambah_planet" class="btn-compact btn-primary">Tambah Planet</button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <section class="dashboard-section">
        <div class="section-header">
            <h2>Daftar Planet</h2>
            <span class="badge"><?= mysqli_num_rows($planet_result) ?> items</span>
        </div>
        
        <div class="table-responsive">
            <table class="compact-table">
                <thead>
                    <tr>
                        <th width="40">No</th>
                        <th>Nama Planet</th>
                        <th width="80">Jenis</th>
                        <th width="60">Gambar</th>
                        <th>Deskripsi</th>
                        <th width="120" class="action-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php while ($planet = mysqli_fetch_assoc($planet_result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($planet['nama_planet']) ?></td>
                        <td><?= $planet['jenis_planet'] ?></td>
                        <td>
                            <?php if ($planet['gambar']): ?>
                                <img src="img/<?= $planet['gambar'] ?>" alt="<?= $planet['nama_planet'] ?>" class="table-img">
                            <?php else: ?>
                                <div class="no-image">-</div>
                            <?php endif; ?>
                        </td>
                        <td class="truncate-text" title="<?= htmlspecialchars($planet['deskripsi']) ?>">
                            <?= substr($planet['deskripsi'], 0, 80) ?>...
                        </td>
                        <td class="action-cell">
                            <a href="dashboard.php?edit_planet=<?= $planet['id'] ?>" class="btn-compact btn-warning">Edit</a>
                            <a href="dashboard.php?hapus_planet=<?= $planet['id'] ?>" class="btn-compact btn-danger" 
                               onclick="return confirmDelete('<?= $planet['nama_planet'] ?>')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="dashboard-section">
        <div class="section-header">
            <h2><?= isset($_GET['edit_bendalangit']) ? 'Edit Benda Langit' : 'Tambah Benda Langit Baru' ?></h2>
            <span class="badge">Form</span>
        </div>
        
        <?php
        $edit_benda = null;
        if (isset($_GET['edit_bendalangit'])) {
            $id = $_GET['edit_bendalangit'];
            $result = mysqli_query($conn, "SELECT * FROM bendalangit WHERE id=$id");
            $edit_benda = mysqli_fetch_assoc($result);
        }
        ?>
        
        <form method="POST" action="dashboard.php" enctype="multipart/form-data" class="compact-form">
            <?php if ($edit_benda): ?>
                <input type="hidden" name="id_benda" value="<?= $edit_benda['id'] ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label>Nama Benda Langit:</label>
                <input type="text" name="nama_objek" value="<?= $edit_benda ? $edit_benda['nama_objek'] : '' ?>" required>
            </div>
            
            <div class="form-group">
                <label>Jenis Objek:</label>
                <select name="jenis_objek" required>
                    <option value="Pusat Tata Surya" <?= $edit_benda && $edit_benda['jenis_objek'] == 'Pusat Tata Surya' ? 'selected' : '' ?>>Pusat Tata Surya</option>
                    <option value="Satelit" <?= $edit_benda && $edit_benda['jenis_objek'] == 'Satelit' ? 'selected' : '' ?>>Satelit</option>
                    <option value="Bulan" <?= $edit_benda && $edit_benda['jenis_objek'] == 'Bulan' ? 'selected' : '' ?>>Bulan</option>
                    <option value="Planet Kerdil" <?= $edit_benda && $edit_benda['jenis_objek'] == 'Planet Kerdil' ? 'selected' : '' ?>>Planet Kerdil</option>
                    <option value="Benda Langit Lainnya" <?= $edit_benda && $edit_benda['jenis_objek'] == 'Benda Langit Lainnya' ? 'selected' : '' ?>>Benda Langit Lainnya</option>
                </select>
            </div>
            
            <div class="form-group full-width">
                <label>Deskripsi:</label>
                <textarea name="deskripsi_benda" rows="3" required><?= $edit_benda ? $edit_benda['deskripsi'] : '' ?></textarea>
            </div>
            
            <div class="form-group full-width">
                <label>Gambar:</label>
                <div class="file-input-wrapper">
                    <div class="file-input-label">
                        <?= $edit_benda && $edit_benda['gambar'] ? 'Ganti Gambar' : 'Pilih Gambar' ?>
                    </div>
                    <input type="file" name="gambar_benda" accept="image/*" <?= !$edit_benda ? 'required' : '' ?>>
                </div>
                <?php if ($edit_benda && $edit_benda['gambar']): ?>
                    <small>Gambar saat ini: <?= $edit_benda['gambar'] ?></small>
                <?php endif; ?>
            </div>
            
            <div class="form-actions">
                <?php if ($edit_benda): ?>
                    <button type="submit" name="edit_bendalangit" class="btn-compact btn-warning">Update Benda Langit</button>
                    <a href="dashboard.php" class="btn-compact btn-danger">Batal</a>
                <?php else: ?>
                    <button type="submit" name="tambah_bendalangit" class="btn-compact btn-primary">Tambah Benda Langit</button>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <section class="dashboard-section">
        <div class="section-header">
            <h2>Daftar Benda Langit</h2>
            <span class="badge"><?= mysqli_num_rows($bendalangit_result) ?> items</span>
        </div>
        
        <div class="table-responsive">
            <table class="compact-table">
                <thead>
                    <tr>
                        <th width="40">No</th>
                        <th>Nama Objek</th>
                        <th width="100">Jenis</th>
                        <th width="60">Gambar</th>
                        <th>Deskripsi</th>
                        <th width="120" class="action-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php while ($benda = mysqli_fetch_assoc($bendalangit_result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($benda['nama_objek']) ?></td>
                        <td><?= $benda['jenis_objek'] ?></td>
                        <td>
                            <?php if ($benda['gambar']): ?>
                                <img src="img/<?= $benda['gambar'] ?>" alt="<?= $benda['nama_objek'] ?>" class="table-img">
                            <?php else: ?>
                                <div class="no-image">-</div>
                            <?php endif; ?>
                        </td>
                        <td class="truncate-text" title="<?= htmlspecialchars($benda['deskripsi']) ?>">
                            <?= substr($benda['deskripsi'], 0, 80) ?>...
                        </td>
                        <td class="action-cell">
                            <a href="dashboard.php?edit_bendalangit=<?= $benda['id'] ?>" class="btn-compact btn-warning">Edit</a>
                            <a href="dashboard.php?hapus_bendalangit=<?= $benda['id'] ?>" class="btn-compact btn-danger" 
                               onclick="return confirmDelete('<?= $benda['nama_objek'] ?>')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<footer>
    <p>Referensi: <a href="http://www.spaceopedia.com/">Spaceopedia</a></p>
</footer>
    
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'No file chosen';
            const label = this.closest('.file-input-wrapper').querySelector('.file-input-label');
            label.textContent = fileName;
        });
    });
    
    const messages = document.querySelectorAll('.dashboard-message');
    messages.forEach(message => {
        setTimeout(() => {
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 300);
        }, 5000);
    });
});
</script>
</body>
</html>
<?php mysqli_close($conn); ?>