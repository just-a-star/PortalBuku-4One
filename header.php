<header class="header">
  <!-- Topbar -->
  <section class="topbar">
    <div class="container">
      <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
          <a class="nav-link" href="#">Download aplikasi</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleTopbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleTopbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Butuh bantuan?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mitra Portal Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about us.html">Tentang Portal Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <img src="/4One/PortalBuku-4One/resources/gambar/person-circle.svg" alt="icon-user" />
                  <!-- If there is session print name -->
                  <?php if (isset($_SESSION["nama_depan"])) : ?>
                  <?php echo "Halo, " . $_SESSION["nama_depan"] ?>
                  <?php endif; ?>

              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
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
          <form class="d-flex me-5" role="search">
            <div class="input-group ">
              <input type="text" class="form-control" placeholder="Cari buku" aria-describedby="button-addon2" />
              <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                <img src="/4One/PortalBuku-4One\resources\gambar\search.svg" alt="icon-search" />
              </button>
            </div>
          </form>
          <div class="nav-item dropdown me-5">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
            <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
              <a href="feature.html" class="dropdown-item">Features</a>
              <a href="team.html" class="dropdown-item">Our Team</a>
              <a href="testimonial.html" class="dropdown-item">Testimonial</a>
              <a href="404.html" class="dropdown-item">404 Page</a>
            </div>
          </div>
          <a href="contact.html" class="nav-item nav-link me-3">Menjadi donatur</a>
        </div>
        <div class="col-2">
          <div class="d-grid ms-auto">
            <button onclick="document.location='/4One/PortalBuku-4One/login/login.php'" type="button"
              class="btn btn-primary btn-blok">Login</button>
          </div>
        </div>
        <div class="col-2">
          <div class="d-grid ms-auto">
            <button onclick="document.location='/4One/PortalBuku-4One/register/sign-up.html'" type="button"
              class="btn btn-outline-primary btn-blok">
              Sign Up
            </button>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->
</header>