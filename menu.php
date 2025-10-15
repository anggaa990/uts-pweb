<?php include 'backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Menu | Restoran King</title>
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
    table th {
      background-color: #212529 !important;
      color: #fff !important;
    }
    .menu-img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 0.5rem;
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
      <h3>🍛 Kelola Menu Restoran</h3>
      <p class="text-muted">Tambah dan hapus menu yang tersedia di Restoran King.</p>
    </div>

    <!-- Form Tambah -->
    <div class="card p-4 mb-4">
      <h5 class="mb-3"> Tambah Menu Baru</h5>
      <form action="backend/menu_crud.php" method="POST" enctype="multipart/form-data" class="row g-3 align-items-center">
        <div class="col-md-3">
          <input type="text" name="nama_menu" class="form-control" placeholder="Nama menu" required>
        </div>
        <div class="col-md-2">
          <input type="number" name="harga" class="form-control" placeholder="Harga" required>
        </div>
        <div class="col-md-3">
          <select name="kategori" class="form-select" required>
            <option value="">Pilih kategori</option>
            <?php
              $kategori = $conn->query("SELECT * FROM kategori");
              foreach ($kategori as $k): ?>
              <option value="<?= $k['nama_kategori'] ?>"><?= htmlspecialchars($k['nama_kategori']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-3">
          <input type="file" name="gambar" class="form-control" accept="image/*" required>
        </div>
        <div class="col-md-1">
          <button type="submit" name="tambah" class="btn btn-primary w-100">+</button>
        </div>
      </form>
    </div>

    <!-- Tabel Menu -->
    <div class="card p-4">
      <h5 class="mb-3">📋 Daftar Menu</h5>
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Gambar</th>
              <th>Nama Menu</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th width="15%">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $stmt = $conn->query("SELECT * FROM menu ORDER BY id_menu DESC");
            $no = 1;
            foreach ($stmt as $row):
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><img src="assets/img/<?= htmlspecialchars($row['gambar']) ?>" class="menu-img"></td>
              <td><?= htmlspecialchars($row['nama_menu']) ?></td>
              <td><?= htmlspecialchars($row['kategori']) ?></td>
              <td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
              <td>
                <a href="backend/menu_crud.php?hapus=<?= $row['id_menu'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
