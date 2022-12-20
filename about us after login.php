<?php

session_start();

if (isset($_SESSION["user_id"])) {
  $mysqli = require("..\PortalBuku-4One\connection\database.php");

  $sql = "SELECT * FROM user
          WHERE id = {$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing Page</title>
  <link href="\PortalBuku-4One\resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/PortalBuku-4One/css/styleLP.css" />
</head>

<body>

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
                <a class="nav-link" href="#hubkami">Butuh bantuan?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mitra Portal Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/PortalBuku-4One/about us after login.php">Tentang Portal Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile\profil.php">
                  <img src="/PortalBuku-4One/resources/gambar/person-circle.svg" alt="icon-user" />
                  <?php echo "Halo, " . $_SESSION["nama_depan"] ?>
                </a>
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
          <span class="navbar-brand mb-0 h1" onclick="document.location='homepage.php'">Portal
            Buku.id</span>
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
                <img src="/PortalBuku-4One\resources\gambar\search.svg" alt="icon-search" />
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
            <button onclick="document.location='/PortalBuku-4One/login/logout.php'" type="button"
              class="btn btn-primary btn-blok">Logout</button>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->

  <!-- Page Header Start -->
  <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
      <!-- <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1> -->
      <h1 class="text-white">Dengan Buku Kami Membangun Negeri</h1>
      <!-- <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
          <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
          <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
        </ol>
      </nav> -->
    </div>
  </div>
  <!-- Page Header End -->


  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <h5 class="text-center">ABOUT US</h5><br>
        <p>
          Portal buku adalah website dimana kalian bisa mendonasikan, menyewa dan meminta buku untuk para pelajar. Potal
          Buku.id terinspirasi dari kurangnya inisiatif pelajar untuk mencari atau membaca buku ke perpustakaan dan
          banyaknya pelajar yang membutuhkan buku tetapi tidak mempunyai cukup uang untuk membeli ataupun menyewa buku.
          Portal buku merupakan website yang tujuannya yaitu seseorang bisa mendonasikan buku-buku yang tidak dibutuhkan
          untuk orang-orang yang membutuhkan, memudahkan pelajar dalam mencari dan menyewa buku yang dibutuhkan.
        </p>
        <br />
      </div>
      <div class="col"></div>
    </div>
  </div>

  <!-- Team Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <h4 class="section-title text-center px-3">MEET THE TEAM</h4>
        <h1 class="display-6 mb-4">Dedicated to blabla, with 100 years of combined experience blabla</h1>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item text-center p-4">
            <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
              src="/PortalBuku-4One/resources/gambar/team-1.jpg" alt="">
            <div class="team-text">
              <div class="team-title">
                <h5>Bintang Rahmatullah</h5>
                <span>Ketua - 21523283</span>
              </div>
              <div class="team-social">
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/facebook.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/whatsapp.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/instagram.svg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="team-item text-center p-4">
            <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
              src="/PortalBuku-4One/resources/gambar/team-2.jpg" alt="">
            <div class="team-text">
              <div class="team-title">
                <h5>Aisya H</h5>
                <span>Anggota - 21523061</span>
              </div>
              <div class="team-social">
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/facebook.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/whatsapp.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/instagram.svg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="team-item text-center p-4">
            <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
              src="/PortalBuku-4One/resources/gambar/team-2.jpg" alt="">
            <div class="team-text">
              <div class="team-title">
                <h5>Fadhilah Andriana C.</h5>
                <span>Anggota - 21523016</span>
              </div>
              <div class="team-social">
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/facebook.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/whatsapp.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/instagram.svg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
          <div class="team-item text-center p-4">
            <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
              src="/PortalBuku-4One/resources/gambar/team-2.jpg" alt="">
            <div class="team-text">
              <div class="team-title">
                <h5>Sausan Trisdiatin</h5>
                <span>Anggota - 21523052</span>
              </div>
              <div class="team-social">
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/facebook.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/whatsapp.svg" alt=""></a>
                <a class="btn btn-square btn-primary rounded-circle" href=""><img
                    src="/PortalBuku-4One/resources/gambar/instagram.svg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team End -->


  <hr class="h" />

  <div class="container">
    <h6>Sejarah Portal Buku.id</h6>
    <p>
      Portal buku adalah website dimana kalian bisa mendonasikan, menyewa dan
      meminta buku untuk para pelajar. Potal Buku.id terinspirasi dari
      kurangnya inisiatif pelajar untuk mencari atau membaca buku ke
      perpustakaan dan banyaknya pelajar yang membutuhkan buku tetapi tidak
      mempunyai cukup uang untuk membeli ataupun menyewa buku. Portal buku
      merupakan website yang tujuannya yaitu seseorang bisa mendonasikan
      buku-buku yang tidak dibutuhkan untuk orang-orang yang membutuhkan,
      memudahkan pelajar dalam mencari dan menyewa buku yang dibutuhkan.
    </p>
  </div>

  <br /><br /><br />

  <div class="container" id="peta">
    <h6>Temukan kami di/Lokasi Portal Buku</h6>
    <br />
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126526.60475434826!2d110.2814112625!3d-7.687828499999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5e970cd4fa51%3A0xa527d07122b90c40!2sUniversitas%20Islam%20Indonesia!5e0!3m2!1sid!2sid!4v1669741615784!5m2!1sid!2sid"
      width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <br /><br /><br />

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-2">
          <h6>Mari mengenal kami</h6>
          <ul class="no-bullets">
            <li>Artikel</li>
            <li>About Portal Buku</li>
            <li>Mitra Portal Buku</li>
          </ul>
          <br />
          <h6>Kategori Buku</h6>
          <ul class="no-bullets">
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
            <li>Mitra Portal Buku</li>
          </ul>
        </div>
        <div class="col-1">
          <h6>Sewa</h6>
          <ul class="no-bullets">
            <li>Artikel</li>
            <li>Artikel</li>
            <li>Artikel</li>
          </ul>
        </div>
        <div class="col-2">
          <h6>Terima Buku</h6>
          <ul class="no-bullets">
            <li>Artikel</li>
            <li>Artikel</li>
            <li>Artikel</li>
          </ul>
        </div>
        <div class="col-2">
          <h6>Donasi Buku</h6>
          <ul class="no-bullets">
            <li>Artikel</li>
            <li>Artikel</li>
            <li>Artikel</li>
          </ul>
        </div>
        <div class="col">
          <div class="row">
            <h6>Punya Sebuah Pertanyaan?</h6>
            <p>
              Kita dapat membantu kamu kapan saja, silahkan kirim pesan
              melalui form dibawah :)
            </p>
            <div class="col ms-auto mb-2 mb-lg-0" id="hubkami">
              <h5 class="text-center">Kontak kami:</h5>
              <br />
              <div class="row">
                <div class="col mb-3">
                  <label class="form-label">FIRST NAME</label>
                  <input type="text" class="form-control" />
                </div>
                <div class="col mb-3">
                  <label class="form-label">LAST NAME</label>
                  <input type="text" class="form-control" />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">EMAIL</label>
                <input type="email" class="form-control" />
              </div>
              <div class="mb-3">
                <label class="form-label">PESAN</label>
                <textarea id="pesan" class="form-control" rows="3"></textarea>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                  Kirim Pesan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br /><br /><br /><br />

  <div class="container text-center">
    <div class="row">
      <h6>Our Sosial Media</h6>
    </div>
    <div class="row">
      <h2>
        <img src="/PortalBuku-4One/resources/gambar/whatsapp.svg" alt="logo-wa" />
        <img src="/PortalBuku-4One/resources/gambar/facebook.svg" alt="logo-fb" />
        <img src="/PortalBuku-4One/resources/gambar/instagram.svg" alt="logo-ig" />
        <img src="/PortalBuku-4One/resources/gambar/tiktok.svg" alt="logo-tiktok" />
      </h2>
    </div>
  </div>
  <br /><br /><br />

  <section class="footer">
    <div class="container text-center">
      <div class="row">
        <h6 style="font-size: 95%">&copy; 2022 PortalBuku, 4One Corporate</h6>
      </div>
    </div>
  </section>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>

</body>

</html>