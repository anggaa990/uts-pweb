<?php
try {
    $db_path = __DIR__ . '/database.db';
    $conn = new PDO("sqlite:" . $db_path);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buat tabel
    $conn->exec("
        CREATE TABLE IF NOT EXISTS kategori (
            id_kategori INTEGER PRIMARY KEY AUTOINCREMENT,
            nama_kategori TEXT
        );

        CREATE TABLE IF NOT EXISTS menu (
            id_menu INTEGER PRIMARY KEY AUTOINCREMENT,
            nama_menu TEXT,
            kategori TEXT,
            harga INTEGER,
            gambar TEXT
        );

        CREATE TABLE IF NOT EXISTS pesanan (
            id_pesanan INTEGER PRIMARY KEY AUTOINCREMENT,
            nama_pelanggan TEXT,
            id_menu INTEGER,
            jumlah INTEGER,
            total INTEGER,
            tanggal TEXT DEFAULT CURRENT_TIMESTAMP
        );
    ");
} catch (PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}
?>
