<?php include 'backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Kategori | Restoran King</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      min-height: 100vh;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: 0.3s ease;
    }
    .card:hover {
      transform: translateY(-3px);
    }
    h3 {
      font-weight: 600;
      color: #212529;
    }
    table th {
      background-color: #212529 !important;
      color: white !important;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0069d9;
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container py-5">
    <div class="text-center mb-5">
      <h3>🍽️ Kelola Kategori Menu</h3>
      <p class="text-muted">Tambah, ubah, dan hapus kategori menu dengan mudah.</p>
    </div>

    <!-- Form Tambah -->
    <div class="card p-4 mb-4">
      <form action="backend/kategori_crud.php" method="POST" class="row g-2 align-items-center">
        <div class="col-md-10">
          <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori..." required>
        </div>
        <div class="col-md-2 text-end">
          <button type="submit" name="tambah" class="btn btn-primary w-100">Tambah</button>
        </div>
      </form>
    </div>

    <!-- Tabel -->
    <div class="card p-4">
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Nama Kategori</th>
              <th width="25%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $stmt = $conn->query("SELECT * FROM kategori ORDER BY id_kategori DESC");
              $no = 1;
              foreach ($stmt as $row):
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
              <td>
                <a href="?edit=<?= $row['id_kategori'] ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                <a href="backend/kategori_crud.php?hapus=<?= $row['id_kategori'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                   Hapus
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Form Edit -->
    <?php if (isset($_GET['edit'])):
      $id = $_GET['edit'];
      $edit = $conn->query("SELECT * FROM kategori WHERE id_kategori=$id")->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="card p-4 mt-4">
      <h5 class="mb-3">✏️ Edit Kategori</h5>
      <form action="backend/kategori_crud.php" method="POST">
        <input type="hidden" name="id_kategori" value="<?= $edit['id_kategori'] ?>">
        <div class="mb-3">
          <label for="nama_kategori" class="form-label">Nama Kategori</label>
          <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" 
                 value="<?= htmlspecialchars($edit['nama_kategori']) ?>" required>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" name="edit" class="btn btn-success me-2">Simpan</button>
          <a href="kategori.php" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
