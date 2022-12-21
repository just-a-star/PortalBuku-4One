<header class="header">

  </section>

  <!-- Header -->
  <section class="header sticky-top">
    <nav class="navbar">
      <div class="container">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">Portal Buku.id</span>
        </div>
      </div>
    </nav>
  </section>

  <!-- Navbar Start -->
  <div class="container">
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <a href="#" class="navbar ms-3 d-lg-none text-dark">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="admin-dashboard.php" class="nav-item nav-link active">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="admin-produk.php" class="nav-item nav-link">Produk</a>
            </li>
            <li class="nav-item">
              <a href="admin-pesanan.php" class="nav-item nav-link">Pesanan</a>
            </li>
            <li class="nav-item">
              <a href="admin-data-user.php" class="nav-item nav-link">Data user</a>
            </li>
            <li class="nav-item">
              <a href="admin-pesan.php" class="nav-item nav-link">Pesan</a>
            </li>
          </ul>
          <ul class="nav justify-content-end">
            <li class="nav-item d-flex">
              <a href="contact.html" class="nav-item nav-link">
                <img src="/PortalBuku-4One/resources/gambar/person-circle.svg" alt="icon-user" />
                <!-- If there is session print name -->
                <div class="card text-center" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Data admin</h5>
                    <p class="card-text">Nama : <span><?php echo $_SESSION['nama_admin'] ?></span></p>
                    <p class="card-text">Email : <span><?php echo $_SESSION['email_admin'] ?></span></p>
                    <a href="/PortalBuku-4One/login/logout.php" class="btn btn-primary">Logout</a>
                  </div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>



</header>