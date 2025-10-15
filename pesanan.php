<?php include 'backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesanan Pelanggan | Restoran King</title>
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
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container py-5">
    <div class="text-center mb-5">
      <h3>🧾 Kelola Pesanan Pelanggan</h3>
      <p class="text-muted">Lihat dan kelola daftar pesanan pelanggan di Restoran King.</p>
    </div>

    <!-- Form Tambah Pesanan -->
    <div class="card p-4 mb-4">
      <h5 class="mb-3"> Tambah Pesanan Baru</h5>
      <form action="backend/pesanan_crud.php" method="POST" class="row g-3 align-items-center">
        <div class="col-md-3">
          <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama pelanggan" required>
        </div>
        <div class="col-md-3">
          <select name="id_menu" class="form-select" required>
            <option value="">Pilih menu</option>
            <?php
              $menu = $conn->query("SELECT * FROM menu");
              foreach ($menu as $m): ?>
              <option value="<?= $m['id_menu'] ?>"><?= htmlspecialchars($m['nama_menu']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-2">
          <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
        </div>
        <div class="col-md-2">
          <button type="submit" name="tambah" class="btn btn-primary w-100">Tambah</button>
        </div>
      </form>
    </div>

    <!-- Tabel Pesanan -->
    <div class="card p-4">
      <h5 class="mb-3">📋 Daftar Pesanan</h5>
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Nama Pelanggan</th>
              <th>Menu</th>
              <th>Jumlah</th>
              <th>Total</th>
              <th>Tanggal</th>
              <th width="10%">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $stmt = $conn->query("SELECT p.*, m.nama_menu 
                                  FROM pesanan p 
                                  LEFT JOIN menu m ON p.id_menu=m.id_menu 
                                  ORDER BY p.id_pesanan DESC");
            $no = 1;
            foreach ($stmt as $row):
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
              <td><?= htmlspecialchars($row['nama_menu']) ?></td>
              <td><?= $row['jumlah'] ?></td>
              <td>Rp<?= number_format($row['total'], 0, ',', '.') ?></td>
              <td><?= $row['tanggal'] ?></td>
              <td>
                <a href="backend/pesanan_crud.php?hapus=<?= $row['id_pesanan'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
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
