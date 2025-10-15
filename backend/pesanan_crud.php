<?php
include 'koneksi.php';

// CREATE
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_pelanggan'];
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    $stmt = $conn->prepare("SELECT harga FROM menu WHERE id_menu=:id");
    $stmt->execute([':id'=>$id_menu]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $menu['harga'] * $jumlah;
    $tanggal = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO pesanan (nama_pelanggan, id_menu, jumlah, total, tanggal)
                            VALUES (:nama, :id_menu, :jumlah, :total, :tanggal)");
    $stmt->execute([':nama'=>$nama, ':id_menu'=>$id_menu, ':jumlah'=>$jumlah, ':total'=>$total, ':tanggal'=>$tanggal]);
    header("Location: ../pesanan.php");
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $conn->prepare("DELETE FROM pesanan WHERE id_pesanan=:id");
    $stmt->execute([':id'=>$id]);
    header("Location: ../pesanan.php");
}
?>
