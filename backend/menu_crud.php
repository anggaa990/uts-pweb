<?php
include 'koneksi.php';

// CREATE
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../assets/img/" . $gambar);

    $stmt = $conn->prepare("INSERT INTO menu (nama_menu, harga, kategori, gambar) 
                            VALUES (:nama, :harga, :kategori, :gambar)");
    $stmt->execute([':nama'=>$nama, ':harga'=>$harga, ':kategori'=>$kategori, ':gambar'=>$gambar]);
    header("Location: ../menu.php");
}

// UPDATE
if (isset($_POST['edit'])) {
    $id = $_POST['id_menu'];
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "../assets/img/" . $gambar);
        $stmt = $conn->prepare("UPDATE menu SET nama_menu=:nama, harga=:harga, kategori=:kategori, gambar=:gambar WHERE id_menu=:id");
        $stmt->execute([':nama'=>$nama, ':harga'=>$harga, ':kategori'=>$kategori, ':gambar'=>$gambar, ':id'=>$id]);
    } else {
        $stmt = $conn->prepare("UPDATE menu SET nama_menu=:nama, harga=:harga, kategori=:kategori WHERE id_menu=:id");
        $stmt->execute([':nama'=>$nama, ':harga'=>$harga, ':kategori'=>$kategori, ':id'=>$id]);
    }
    header("Location: ../menu.php");
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $conn->prepare("DELETE FROM menu WHERE id_menu=:id");
    $stmt->execute([':id'=>$id]);
    header("Location: ../menu.php");
}
?>
