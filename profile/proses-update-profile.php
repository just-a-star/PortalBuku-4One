<?php
// Mohon dibuatkan notifikasi setelah berhasil update profile
session_start();

if (isset($_POST["submit"])) {
  $nama_depan = $_POST["nama_depan"];
  $nama_belakang = $_POST["nama_belakang"];
  $no_telepon = $_POST["no_telepon"];
  $email = $_POST["email"];
  $alamat = $_POST["alamat"];
  $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
  
  $mysqli = require __DIR__ . "/database.php";

  $sql = "UPDATE `user` SET
`nama_depan`='$nama_depan',`nama_belakang`='$nama_belakang',`no_telepon`='$no_telepon',`email`='$email',`alamat`='$email',`password_hash`='$password_hash'
WHERE id= {$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);
  // $user = $result->fetch_assoc();

  if($result){
    header("Location: profil.php?msg=Berhasil update profile");
  } else {
    echo "Gagal" . mysqli_error($mysqli);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing Page</title>
  <link href="resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="styleEP.css" />
</head>

<body>
  <?php
  $id = $_SESSION["user_id"];
  $mysqli = require __DIR__ . "/database.php";

  $sql = "SELECT * FROM user
          WHERE id = $id LIMIT 1";

  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
  ?>

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
                <a class="nav-link" href="#">Tentang Portal Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <img src="gambar/person-circle.svg" alt="icon-user" /> Halo,
                  <?php echo $_SESSION["nama_depan"] ?>
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
          <span class="navbar-brand mb-0 h1" onclick="document.location='after-login.php'">Portal Buku.id</span>
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
                <img src="gambar/search.svg" alt="icon-search" />
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
            <button onclick="document.location='logout.php'" type="button"
              class="btn btn-primary btn-blok">Logout</button>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->

  <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
      <a class="nav-link active ms-0" id="pageeditprofil" href="" target="__blank">Profil</a>
      <a class="nav-link" href="" target="__blank">Pembayaran</a>
      <a class="nav-link" href="" target="__blank">Keamanan</a>
      <a class="nav-link" href="" target="__blank">Notifikasi</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
      <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
          <div class="card-header">Foto Profil</div>
          <div class="card-body text-center">
            <!-- Profile picture image-->
            <img class="img-account-profile rounded-circle mb-2" src="gambar/person-circle.svg" alt="">
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
          <div class="card-header">Detail Akun</div>
          <div class="card-body">
            <form action="" method="post">
              <!-- Form Row-->
              <div class="row gx-3 mb-3">
                <!-- Form Group (first name)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="nama_depan">Nama Depan</label>
                  <input class="form-control" id="nama_depan" name="nama_depan" type="text"
                    value="<?php echo $_SESSION["nama_depan"] ?>">
                </div>
                <!-- Form Group (last name)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="nama_belakang">Nama Belakang</label>
                  <input class="form-control" id="nama_belakang" name="nama_belakang" type="text"
                    value="<?php echo $_SESSION["nama_belakang"] ?>">
                </div>
              </div>
              <!-- Form Group (No Telp)-->
              <div class="mb-3">
                <label class="small mb-1" for="no_telepon">Nomor Telepon</label>
                <input class="form-control" id="no_telepon" name="no_telepon" type="tel"
                  value="<?php echo $_SESSION["no_telepon"] ?>">
              </div>
              <!-- Form Group (Email)-->
              <div class="mb-3">
                <label class="small mb-1" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email"
                  value="<?php echo $_SESSION["email"] ?>">
              </div>
              <!-- Form Group (username)-->
              <div class="mb-3">
                <label class="small mb-1" for="alamat">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" type="text"
                  value="<?php echo $_SESSION["alamat"] ?>">
              </div>
              <!-- Form Group (Password)-->
              <div class="mb-3">
                <label class="small mb-1" for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password"
                  placeholder="Masukkan password" value="<?php
                  echo $_SESSION["password"] ?>">

              </div>
              <!-- Save changes button-->
              <br>
              <button class="btn btn-primary" name="submit" type="submit">Ubah Profil</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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
        <img src="gambar/whatsapp.svg" alt="logo-wa" />
        <img src="gambar/facebook.svg" alt="logo-fb" />
        <img src="gambar/instagram.svg" alt="logo-ig" />
        <img src="gambar/tiktok.svg" alt="logo-tiktok" />
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
  <script>
  function passFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>

</body>

</html>