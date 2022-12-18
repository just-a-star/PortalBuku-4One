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
    <nav class="navbar navbar-expand-lg wow fadeIn" data-wow-delay="0.1s">
      <a href="#" class="navbar ms-3 d-lg-none text-dark">MENU</a>
      <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto">
          <a href="index.html" class="nav-item nav-link active">Home</a>
          <a href="about us.html" class="nav-item nav-link">Produk</a>
          <a href="contact.html" class="nav-item nav-link">Pesanan</a>
          <a href="contact.html" class="nav-item nav-link">Data user</a>
          <a href="contact.html" class="nav-item nav-link">Pesan</a>
          <a href="contact.html" class="nav-item nav-link"><img
              src="/4One/PortalBuku-4One/resources/gambar/person-circle.svg" alt="icon-user" />
            <!-- If there is session print name -->


            <div class="card text-center" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Data admin</h5>
                <p class="card-text">Nama : <span><?php echo $_SESSION['nama_admin'] ?></span></p>
                <p class="card-text">Email : <span><?php echo $_SESSION['email_admin'] ?></span></p>

                <a href="/4One/PortalBuku-4One/login/logout.php" class="btn btn-primary">Logout</a>
              </div>
            </div>
            <!-- <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div> -->
        </div>

      </div>
  </div>
  </nav>
  </div>

</header>