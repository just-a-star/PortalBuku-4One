<?php

session_start();

if (isset($_SESSION["user_id"])) {
  $mysqli = require __DIR__ . "/connection/database.php";

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
  <link href="resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/PortalBuku-4One/css/styleLP.css" />
</head>

<?php include '../PortalBuku-4One/header.php'; ?>

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
      <img src="/PortalBuku-4One\resources\gambar\buku.jpg" alt="" style="width: 100%" />
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
        <button type="button" class="btn btn-primary" onclick="alertlogin()">Sewa</button>
      </div>
    </div>
    <div class="col-3">
      <div class="d-grid gap-2">
        <button type="button" class="btn btn-outline-primary" onclick="alertlogin()">
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
        <button type="button" class="btn btn-primary" onclick="alertlogin()">
          Klik disini untuk Donasi Buku
        </button>
      </div>
    </div>
    <div class="col"></div>
  </div>
</div>
<br /><br /><br /><br />

<div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">
      <div class="p-3 border fasilitas">
        <h6>
          <img src="/PortalBuku-4One\resources\gambar\shield-fill-check.svg" alt="icon-shield" /> Aman
          Tepercaya
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
          <img src="/PortalBuku-4One\resources\gambar\clock-fill.svg" alt="icon-jam" /> Tepat Waktu
        </h6>
        <p>
          Tepat waktu memiliki arti tindakan mengerjakan apa yang harus dilakukan dengan tepat pada waktu yang telah
          ditentukan sebelumnya. Sesuai dengan tujuan kami kepada Anda untuk selalu mengusahakan pelayanan dan
          pengiriman buku yang tepat waktu.
        </p>
      </div>
    </div>
    <div class="col">
      <div class="p-3 border fasilitas">
        <h6>
          <img src="/PortalBuku-4One\resources\gambar\headset.svg" alt="icon-headset" /> Customer
          Service
        </h6>
        <p>
          Customer Services kami selalu siap dalam menangani, mengumpulkan, mengatur, merespon, mengarahkan, dan
          melayani para pengguna terkait dengan jalannya fungsi aplikasi kami. Apabila Anda memiliki masalah dan keluhan
          terhadap aplikasi kami, silahkan hubungi email portalbuku@gmail.com.
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
      <img src="/PortalBuku-4One\resources\gambar\DPK.png" alt="" style="width: 8%" />
      <img src="/PortalBuku-4One\resources\gambar\LOGO_INDOMIE.png" alt="" style="width: 8%" />
      <img src="/PortalBuku-4One\resources\gambar\logo-bsi.png" alt="" style="width: 8%" />
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

<?php include '../PortalBuku-4One/footer.php'; ?>

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
  function alertlogin() {
    alert("Harap Login Terlebih Dahulu");
  }
</script>

</body>

</html>