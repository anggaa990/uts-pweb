<?php
include 'koneksi.php';

// CREATE
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_kategori'];
    $stmt = $conn->prepare("INSERT INTO kategori (nama_kategori) VALUES (:nama)");
    $stmt->execute([':nama' => $nama]);
    header("Location: ../kategori.php");
}

// UPDATE
if (isset($_POST['edit'])) {
    $id = $_POST['id_kategori'];
    $nama = $_POST['nama_kategori'];
    $stmt = $conn->prepare("UPDATE kategori SET nama_kategori=:nama WHERE id_kategori=:id");
    $stmt->execute([':nama' => $nama, ':id' => $id]);
    header("Location: ../kategori.php");
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $conn->prepare("DELETE FROM kategori WHERE id_kategori=:id");
    $stmt->execute([':id' => $id]);
    header("Location: ../kategori.php");
}
?>
