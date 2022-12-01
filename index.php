<?php

session_start();

if (isset($_SESSION["user_id"])) {
  $mysqli = require __DIR__ . "/database.php";

  $sql = "SELECT * FROM user
          WHERE id = {$_SESSION["user_id"]}";

  $result = $mysqli->query($sql); $user = $result->fetch_assoc(); } ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing Page</title>
  <link href="resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="styleLP.css" />
</head>

<body>
  <div class="container">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Download aplikasi</a>
      </li>
      <li class="nav-item ms-auto mb-2 mb-lg-0">
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
          Sausan</a>
      </li>
    </ul>
  </div>

  <section class="header">
    <nav class="navbar">
      <div class="container">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">Portal Buku.id</span>
        </div>
      </div>
    </nav>
  </section>

  <br />
  <div class="container text-center">
    <div class="row">
      <div class="col-4">
        <form class="d-flex" role="search">
          <img src="gambar/list.svg" alt="icon-list" />
          <!-- <input class="form-control me-2" type="search" placeholder="Buku apa yang mau anda cari" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit"><img src="gambar/search.svg" alt="icon-search"></button> -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buku apa yang mau anda cari"
              aria-label="Recipient's username" aria-describedby="button-addon2" />
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
              <img src="gambar/search.svg" alt="icon-search" />
            </button>
          </div>
        </form>
      </div>
      <div class="col-2">
        <!-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div> -->
        <div class="col-12">
          <select class="form-select" id="inlineFormSelectPref">
            Kategori
            <option selected>Kategori..</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
      <div class="col-2">
        <a class="nav-link" href="#">Menjadi Donatur</a>
      </div>
      <div class="col-2">
        <div class="d-grid">
          <button onclick="document.location='login.php'" type="button" class="btn btn-primary">Login</button>
        </div>
      </div>
      <div class="col-2">
        <div class="d-grid">
          <button onclick="document.location='sign-up.html'" class="btn btn-outline-primary">
            Sign Up
          </button>
        </div>
      </div>
    </div>
  </div>
  <br />

  <div class="container text-center">
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <br />
        <h3>Temukan buku yang kamu cari</h3>
        <p style="text-align: left">
          Hai hai teman-teman! suka baca buku? atau sedang mencari referensi
          materi? kami dari Portal Buku.id menyediakan berbagai jenis buku
          yang bisa teman-teman sewa untuk waktu yang telah ditentukan dengan
          harga sesuai kantong mahasiswa.
        </p>
        <img src="gambar/buku.jpg" alt="" style="width: 100%" />
      </div>
      <div class="col"></div>
    </div>
  </div>
  <br />

  <div class="container text-center">
    <div class="row">
      <div class="col"></div>
      <div class="col-3">
        <div class="d-grid gap-2">
          <button type="button" class="btn btn-primary">Sewa</button>
        </div>
      </div>
      <div class="col-3">
        <div class="d-grid gap-2">
          <button type="button" class="btn btn-outline-primary">
            Terima Buku
          </button>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </div>
  <br />
  <br />
  <br />
  <br />

  <div class="container text-center">
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <h5>Mempunyai buku lebih? Donasikan!</h5>
        <p>
          Donasi buku akan menjadi hak milik kami dan akan kami sewakan atau
          berikan kepada mahasiswa yang membutuhkan buku tersebut
        </p>
        <br />
        <div class="d-grid gap-2">
          <button type="button" class="btn btn-primary">
            Klik disini untuk Donasi Buku
          </button>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </div>
  <br /><br /><br /><br />

  <!-- Keunggulan -->
  <!-- <div class="container"> -->
  <!-- <div class="row">
            <div class="col fasilitas">
                <h6><img src="gambar/shield-fill-check.svg" alt="icon-shield"> Aman Terpecaya</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dignissimos similique magnam possimus
                    numquam provident maxime assumenda mollitia enim minima ullam quos veniam consequuntur, inventore
                    culpa cum a odit rerum.</p>
            </div>
            <div class="col-1">
            </div>
            <div class="col fasilitas">
                <h6><img src="gambar/shield-fill-check.svg" alt="icon-shield"> Aman Terpecaya</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dignissimos similique magnam possimus
                    numquam provident maxime assumenda mollitia enim minima ullam quos veniam consequuntur, inventore
                    culpa cum a odit rerum.</p>
            </div>
        </div> -->

  <div class="container overflow-hidden">
    <div class="row gx-5">
      <div class="col">
        <div class="p-3 border fasilitas">
          <h6>
            <img src="gambar/shield-fill-check.svg" alt="icon-shield" /> Aman
            Terpecaya
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
            dignissimos similique magnam possimus numquam provident maxime
            assumenda mollitia enim minima ullam quos veniam consequuntur,
            inventore culpa cum a odit rerum.
          </p>
        </div>
      </div>
      <div class="col">
        <div class="p-3 border fasilitas">
          <h6>
            <img src="gambar/clock-fill.svg" alt="icon-jam" /> Tepat Waktu
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
            dignissimos similique magnam possimus numquam provident maxime
            assumenda mollitia enim minima ullam quos veniam consequuntur,
            inventore culpa cum a odit rerum.
          </p>
        </div>
      </div>
      <div class="col">
        <div class="p-3 border fasilitas">
          <h6>
            <img src="gambar/headset.svg" alt="icon-headset" /> Customer
            Service
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
            dignissimos similique magnam possimus numquam provident maxime
            assumenda mollitia enim minima ullam quos veniam consequuntur,
            inventore culpa cum a odit rerum.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->

  <br /><br />

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
        <img src="gambar/DPK.png" alt="" style="width: 8%" />
        <img src="gambar/LOGO_INDOMIE.png" alt="" style="width: 8%" />
        <img src="gambar/logo-bsi.png" alt="" style="width: 8%" />
      </div>
    </div>
  </div>
  <br />

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
</body>

</html>