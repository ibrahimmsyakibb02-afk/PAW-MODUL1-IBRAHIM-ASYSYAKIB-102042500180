<?php
$produk = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "MONITOR",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "LAPTOP",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "AKSESORIS",
        "harga" => 750000,
        "stok" => 12
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "AKSESORIS",
        "harga" => 250000,
        "stok" => 0
    ],
    [
        "nama" => "Headphone Bluetooth",
        "kategori" => "AUDIO",
        "harga" => 1200000,
        "stok" => 5
    ],
    [
        "nama" => "Webcam 1080p",
        "kategori" => "KAMERA",
        "harga" => 900000,
        "stok" => 0
    ]
];

// Kriteria 11: Menghitung jumlah seluruh produk secara otomatis
$total_produk = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Cia Store</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
        </div>
    </nav>

    <header class="hero">
        <p class="hero-subtitle">CIA STORE</p>
        <h1 class="hero-title">Simple Tech Store.</h1>
        <p class="hero-desc">Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <button class="btn-light">Lihat Produk</button>
    </header>

    <main>
        <div class="katalog-header">
            <div>
                <p class="section-subtitle">OUR PRODUCTS</p>
                <h2 class="section-title">Katalog Produk</h2>
            </div>
            <div class="total-badge">
                Total Produk: <strong><?= $total_produk ?></strong>
            </div>
        </div>

        <section class="product-grid">
            <?php 

            foreach ($produk as $item): 
                
                // CHALLENGE: Logika diskon 10% jika harga >= Rp1.000.000[cite: 1]
                $is_discount = $item['harga'] >= 1000000;
                $harga_akhir = $is_discount ? $item['harga'] - ($item['harga'] * 0.10) : $item['harga'];
            ?>
                
                <!-- Setiap produk ditampilkan dalam bentuk card HTML[cite: 1] -->
                <article class="product-card">
                    <div class="card-header">
                        <span class="kategori"><?= $item['kategori'] ?></span>
                        <?php if ($is_discount): ?>
                            <span class="badge-diskon">DISKON 10%</span>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="nama-produk"><?= $item['nama'] ?></h3>
                    
                    <div class="harga-container">
                        <?php if ($is_discount): ?>
                            <!-- Menampilkan harga normal dicoret jika ada diskon[cite: 1] -->
                            <span class="harga-coret">Rp<?= number_format($item['harga'], 0, ',', '.') ?></span>
                        <?php endif; ?>
                        <!-- Harga menggunakan format Rupiah[cite: 1] -->
                        <span class="harga-akhir">Rp<?= number_format($harga_akhir, 0, ',', '.') ?></span>
                    </div>

                    <div class="stok-container">
                        <span class="jumlah-stok">Stok: <?= $item['stok'] ?></span>
                        
                        <!-- Percabangan status produk[cite: 1] -->
                        <?php if ($item['stok'] > 0): ?>
                            <span class="status-badge tersedia">Tersedia</span>
                        <?php else: ?>
                            <span class="status-badge habis">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <!-- Penentuan ketersediaan tombol beli[cite: 1] -->
                    <?php if ($item['stok'] > 0): ?>
                        <button class="btn-beli">Beli Sekarang</button>
                    <?php else: ?>
                        <button class="btn-beli disabled" disabled>Stok Habis</button>
                    <?php endif; ?>
                </article>

            <?php endforeach; ?>
        </section>
    </main>

    <!-- Footer[cite: 1] -->
    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>
</body>
</html>