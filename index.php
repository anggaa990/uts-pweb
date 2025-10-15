<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Restoran King 🍛</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      color: #333;
      /* Tambahkan gradasi lembut agar lebih berwarna */
      background: linear-gradient(135deg, #fff8e7 0%, #ffe5b4 50%, #ffd6d6 100%);
      background-attachment: fixed;
    }

    /* Hero Section */
    .hero {
      background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
      min-height: 85vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      color: white;
      text-shadow: 0 3px 10px rgba(0,0,0,0.5);
      border-bottom: 5px solid rgba(255,193,7,0.7);
    }
    .hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.4);
    }
    .hero-content {
      position: relative;
      z-index: 1;
    }

    .hero h1 {
      font-weight: 700;
    }
    .hero p {
      font-size: 1.2rem;
    }

    /* Features Section */
    .feature-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      overflow: hidden;
      background-color: white;
    }
    .feature-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .feature-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    footer {
      margin-top: 80px;
      padding: 20px 0;
      background: linear-gradient(90deg, #ffd6d6, #ffe5b4);
      color: #333;
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <!-- Hero Section -->
  <section class="hero text-center">
    <div class="hero-content container">
      <h1 class="display-3 fw-bold">Selamat Datang di <span class="text-warning">Restoran King 👑</span></h1>
      <p class="lead mb-4">Rasakan pengalaman kuliner terbaik dan kelola pesanan pelanggan dengan mudah.</p>
      <a href="menu.php" class="btn btn-warning btn-lg px-4 me-2 fw-semibold">🍽️ Lihat Menu</a>
      <a href="pesanan.php" class="btn btn-outline-light btn-lg px-4 fw-semibold">🧾 Kelola Pesanan</a>
    </div>
  </section>

  <!-- Features Section -->
  <div class="container my-5">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-dark">Fitur Unggulan Restoran King</h2>
      <p class="text-muted">Kelola restoran Anda dengan tampilan modern dan mudah digunakan.</p>
    </div>

    <div class="row g-4">
      <!-- Kelola Menu -->
      <div class="col-md-4">
        <div class="card feature-card">
          <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1920&q=80" alt="Kelola Menu">
          <div class="card-body text-center">
            <h5 class="fw-bold">🍱 Kelola Menu</h5>
            <p class="text-muted">Tambah, ubah, dan hapus daftar makanan lengkap dengan harga dan foto hidangan.</p>
          </div>
        </div>
      </div>

      <!-- Manajemen Kategori -->
      <div class="col-md-4">
        <div class="card feature-card">
          <img src="https://images.unsplash.com/photo-1529042410759-befb1204b468?auto=format&fit=crop&w=800&q=80" alt="Manajemen Kategori">
          <div class="card-body text-center">
            <h5 class="fw-bold">📂 Manajemen Kategori</h5>
            <p class="text-muted">Atur kategori seperti Makanan, Minuman, dan Dessert agar pelanggan mudah memilih.</p>
          </div>
        </div>
      </div>

      <!-- Kelola Pesanan -->
      <div class="col-md-4">
        <div class="card feature-card">
          <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=80" alt="Kelola Pesanan">
          <div class="card-body text-center">
            <h5 class="fw-bold">🧾 Kelola Pesanan</h5>
            <p class="text-muted">Pantau pesanan pelanggan secara real-time dengan tampilan yang interaktif.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center">
    <p class="mb-0">&copy; <?= date('Y'); ?> <strong>Restoran King</strong> | Dibuat dengan ❤️ oleh King</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>