CREATE DATABASE tatasurya;

USE tatasurya;

CREATE TABLE planet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_planet VARCHAR(100) NOT NULL,
    jenis_planet ENUM('Dalam', 'Luar') NOT NULL,
    gambar VARCHAR(255),
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE bendalangit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_objek VARCHAR(100) NOT NULL,
    jenis_objek ENUM('Pusat Tata Surya', 'Satelit', 'Planet Kerdil', 'Benda Langit Lainnya') NOT NULL,
    gambar VARCHAR(255),
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO planet (nama_planet, jenis_planet, gambar, deskripsi) VALUES
('Merkurius', 'Dalam', 'merkurius.png', 'Planet terkecil dan terdekat dengan Matahari. Permukaannya penuh kawah akibat tabrakan meteor.'),
('Venus', 'Dalam', 'venus.png', 'Planet terpanas dalam tata surya dengan atmosfer tebal karbon dioksida. Sering disebut bintang kejora.'),
('Bumi', 'Dalam', 'bumi.png', 'Satu-satunya planet yang diketahui memiliki kehidupan. 70% permukaannya ditutupi air.'),
('Mars', 'Dalam', 'mars.png', 'Planet merah dengan bukti air di masa lalu. Memiliki dua bulan kecil: Phobos dan Deimos.'),
('Jupiter', 'Luar', 'jupiter.png', 'Planet terbesar dalam tata surya dengan Bintik Merah Besar yang merupakan badai raksasa.'),
('Saturnus', 'Luar', 'saturnus.png', 'Planet dengan sistem cincin yang spektakuler terbuat dari es dan batuan.'),
('Uranus', 'Luar', 'uranus.png', 'Planet es raksasa yang berotasi miring hampir 98 derajat.'),
('Neptunus', 'Luar', 'neptunus.png', 'Planet terjauh dengan angin terkencang dalam tata surya mencapai 2.100 km/jam.');

INSERT INTO bendalangit (nama_objek, jenis_objek, gambar, deskripsi) VALUES
('Matahari', 'Pusat Tata Surya', 'matahari.png', 'Bintang di pusat tata surya yang menyediakan energi dan cahaya untuk semua planet. Terdiri dari 73% hidrogen dan 25% helium.'),
('Bulan', 'Satelit', 'bulan.png', 'Satelit alami Bumi yang mempengaruhi pasang surut laut. Terbentuk sekitar 4.5 miliar tahun yang lalu.'),
('Europa', 'Satelit', 'europa.png', 'Satelit Jupiter dengan permukaan es dan lautan di bawah permukaan yang mungkin mendukung kehidupan.'),
('Titan', 'Satelit', 'titan.png', 'Satelit terbesar Saturnus dengan atmosfer tebal dan danau metana cair di permukaannya.'),
('Sabuk Asteroid', 'Benda Langit Lainnya', 'asteroid.png', 'Wilayah antara Mars dan Jupiter yang berisi ribuan asteroid. Asteroid terbesar adalah Ceres.'),
('Komet Halley', 'Benda Langit Lainnya', 'komet.png', 'Benda es dan debu yang berasal dari pinggiran tata surya. Muncul setiap 76 tahun sekali.'),
('Pluto', 'Planet Kerdil', 'pluto.png', 'Benda langit yang mengorbit matahari tapi tidak dominan di orbitnya. Dulu diklasifikasikan sebagai planet kesembilan.'),
('Ganymede', 'Satelit', 'ganymede.png', 'Satelit terbesar Jupiter dan di seluruh Tata Surya, lebih besar dari Merkurius, dan memiliki medan magnetnya sendiri.'),
('Enceladus', 'Satelit', 'enceladus.png', 'Satelit Saturnus yang menyemburkan uap air dan es, mengindikasikan adanya air cair di bawah kerak esnya.'),
('Io', 'Satelit', 'io.png', 'Satelit Jupiter dengan aktivitas vulkanik paling intens di Tata Surya.'),
('Ceres', 'Planet Kerdil', 'ceres.png', 'Planet kerdil terbesar dan satu-satunya yang terletak di Sabuk Asteroid.'),
('Haumea', 'Planet Kerdil', 'haumea.png', 'Planet kerdil di Sabuk Kuiper yang memiliki bentuk lonjong unik dan cincin.'),
('Makemake', 'Planet Kerdil', 'makemake.png', 'Planet kerdil terbesar kedua di Sabuk Kuiper dan salah satu objek merah paling terang.'),
('Awan Oort', 'Benda Langit Lainnya', 'oort.png', 'Hipotesis bola benda es yang mengelilingi Tata Surya pada jarak terjauh, diperkirakan sumber komet berekor panjang.');