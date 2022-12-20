<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

// $_SESSION["user_id"] = $user["id"];
// $_SESSION["nama_depan"] = $user["nama_depan"];
// $_SESSION["nama_belakang"] = $user["nama_belakang"];
// $_SESSION["no_telepon"] = $user["no_telepon"];
// $_SESSION["email"] = $user["email"];
// $_SESSION["alamat"] = $user["alamat"];
// $_SESSION["password"] = $user["password"];
$user_id = $_SESSION['user_id'];
$user_nama_depan = $_SESSION['nama_depan'];


// if(!isset($user_id)){
//   header("Location: ../index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sewa Buku</title>
  <link href="..\resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../css/styleLP.css">
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
          <span class="navbar-brand mb-0 h1" onclick="document.location='/PortalBuku-4One/homepage.php'">Portal
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

  <div class="container border">
    <div class="row">
      <div class="col-md-2 py-5">
        <select class="form-select" id="inlineFormSelectPref">Kategori
          <option selected>Kategori</option>
          <option value="1">Fiksi</option>
          <option value="2">Sastra</option>
          <option value="3">Sains</option>
          <option value="4">Seni</option>
          <option value="5">Sejarah</option>
          <option value="6">Hukum</option>
          <option value="7">Medis</option>
          <option value="8">Pendidikan</option>
        </select>
      </div>
      <div class="col-md-10 py-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/PortalBuku-4One\resources\img/novel.jpg" alt="slide1">
              <div class="carousel-caption">
                <h6>Buku baru telah <br> tersedia!</h6>
                <p>Hai hai teman-teman! <br> suka baca buku? <br> atau sedang mencari referensi materi?</p>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="container text-center">
                  <a class="btn btn-primary btn-lg" href="#" role="button">Lihat lebih lanjut</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="PortalBuku-4One\resources\img/novel.jpg" alt="slide2">
            </div>
            <div class="carousel-item">
              <img src="PortalBuku-4One\resources\img/novel.jpg" alt="slide3">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>

    <div class="text-center">
      <h6>Temukan buku yang kamu cari!</h6>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="PortalBuku-4One\resources\img/buku1.jpg" alt="slide1">
          </div>
          <div class="carousel-item">
            <img src="PortalBuku-4One\resources\img/buku2.jpg" alt="slide2">
          </div>
          <div class="carousel-item">
            <img src="PortalBuku-4One\resources\img/buku3.jpg" alt="slide3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <br>

    <div class="container">
      <h6>Semua buku</h6>
      <a href="/PortalBuku-4One\resources\gambar/buku.jpg" target="_blank"> <img
          src="/PortalBuku-4One\resources\gambar/buku.jpg" alt="" style="width: 10%;">

        < <img src="/PortalBuku-4One\resources\img/buku1.jpg" alt="" style="width: 10%; height: 65px ;">
          <img src="/PortalBuku-4One\resources\img/buku2.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku2.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku2.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku2.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku2.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku2.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku3.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku3.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku3.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku3.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku3.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku3.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku4.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku5.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku6.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/buku7.jpg" alt="" style="width: 10%; height: 65px;">
          <img src="PortalBuku-4One\resources\img/novel.jpg" alt="" style="width: 10%; height: 65px;">
    </div>
    <br>
    <div class="container text-center">
      <a class="btn btn-primary btn-lg" href="#" role="button">Lihat lebih banyak</a>
    </div>
    <br><br>

    <!-- Sponsor -->
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <h6>Sponsor</h6>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <img src="PortalBuku-4One\resources\gambar/DPK.png" alt="" style="width: 8%;">
          <img src="PortalBuku-4One\resources\gambar/LOGO_INDOMIE.png" alt="" style="width: 8%;">
          <img src="PortalBuku-4One\resources\gambar/logo-bsi.png" alt="" style="width: 8%;">
        </div>
      </div>
    </div>
    <br>

    <hr class="h">

    <div class="container">
      <h6>Sejarah Portal Buku.id</h6>
      <p>
        Portal buku adalah website dimana kalian bisa mendonasikan, menyewa dan meminta buku untuk para pelajar.
        Potal Buku.id terinspirasi dari kurangnya inisiatif pelajar untuk mencari atau membaca buku ke
        perpustakaan
        dan banyaknya pelajar yang membutuhkan buku tetapi tidak mempunyai cukup uang untuk membeli ataupun
        menyewa
        buku. Portal buku merupakan website yang tujuannya yaitu seseorang bisa mendonasikan buku-buku yang
        tidak
        dibutuhkan untuk orang-orang yang membutuhkan, memudahkan pelajar dalam mencari dan menyewa buku yang
        dibutuhkan.
      </p>
    </div>
    <br><br><br>

    <div class="container" id="peta">
      <h6>Temukan kami di/Lokasi Portal Buku</h6><br>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126526.60475434826!2d110.2814112625!3d-7.687828499999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5e970cd4fa51%3A0xa527d07122b90c40!2sUniversitas%20Islam%20Indonesia!5e0!3m2!1sid!2sid!4v1669741615784!5m2!1sid!2sid"
        width="100%" height="450" style="border: 0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <br><br><br>

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
            <br>
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
              <p>Kami dapat membantu Anda kapan saja, silahkan kirim pesan melalui form dibawah</p>
              <div class="col ms-auto mb-2 mb-lg-0" id="hubkami">
                <h5 class="text-center">Kontak kami:</h5>
                <br>
                <div class="row">
                  <div class="col mb-3">
                    <label class="form-label">FIRST NAME</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col mb-3">
                    <label class="form-label">LAST NAME</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">EMAIL</label>
                  <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">PESAN</label>
                  <textarea id="pesan" class="form-control" rows="3"></textarea>
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <br><br><br><br>

    <div class="container text-center">
      <div class="row">
        <h6>Our Social Media</h6>
      </div>
      <div class="row">
        <h2>
          <img src="PortalBuku-4One\resources\gambar/instagram.svg" alt="logo-ig">
          <img src="PortalBuku-4One\resources\gambar/instagram.svg" alt="logo-ig">
          <img src="PortalBuku-4One\resources\gambar/instagram.svg" alt="logo-ig">
          <img src="PortalBuku-4One\resources\gambar/instagram.svg" alt="logo-ig">
        </h2>
      </div>
    </div>
    <br><br><br>

    <section class="footer">
      <div class="container text-center">
        <div class="row">
          <h6 style="font-size: 95%; ">&copy;2022 PortalBuku, 4One Corporate</h6>
        </div>
      </div>
    </section>
  </div>
  </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"></script>

</body>

</html>