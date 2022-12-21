<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$admin_id = $_SESSION['id_admin'];

if (!isset($admin_id)) {
  header("Location: ../index.php");
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="..\resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="/PortalBuku-4One/css/styleLP.css" />
  <title>Dashboard</title>
</head>

<body>
  <?php include "admin-header.php"; ?>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <!--<div class="bg" id="sidebar-wrapper">
      <div class="list-group list-group-flush my-3">
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Product</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Order</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">User Data</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Message</a>
      </div>-->
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Dashboard start -->
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <!--<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Dashboard</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2"></i>Jisung
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>-->

    <div class="container-fluid px-5" style="text-align: center;">
      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/jam.png" alt="Card image cap" style="width: 50%;">
          <?php
          $total_pendings = 0;
          $select_pending = mysqli_query(
            $mysqli,
            "SELECT total_harga FROM `order` WHERE status_pembayaran = 'pending'"
          ) or die('query gagal');
          if (mysqli_num_rows($select_pending) > 0) {
            while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
              $total_harga = $fetch_pendings['total_harga'];
              $total_pendings += $total_harga;
            }
            ;
          }
          ;
          ?>
          <h3><?php echo $total_pendings; ?></h3>
          <h5 class="card-title">Total pendings(belum dikonfirmasi)</h5>
        </div>
      </div>

      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/debit.png" alt="Card image cap" style="width: 50%;">
          <?php
          $total_completed = 0;
          $select_completed = mysqli_query(
            $mysqli,
            "SELECT total_harga FROM `order` WHERE status_pembayaran = 'berhasil'"
          ) or die('query gagal');
          if (mysqli_num_rows($select_completed) > 0) {
            while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
              $total_harga = $fetch_completed['total_harga'];
              $total_completed += $total_harga;
            }
            ;
          }
          ;
          ?>
          <h3><?php echo $total_completed; ?></h3>
          <h5 class="card-title">Total pembayaran berhasil</h5>
        </div>
      </div>

      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/paperbag.png" alt="Card image cap" style="width: 50%;">
          <?php
          $select_orders = mysqli_query($mysqli, "SELECT * FROM `order`") or die('query gagal');
          $total_orders = mysqli_num_rows($select_orders);
          ?>
          <h3><?php echo $total_orders; ?></h3>
          <h5 class="card-title">Total orderan</h5>
        </div>
      </div>

      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/keranjangw.png" alt="Card image cap" style="width: 50%;">
          <?php
          $select_buku = mysqli_query($mysqli, "SELECT * FROM `buku`") or die('query gagal');
          $total_buku = mysqli_num_rows($select_buku);
          ?>
          <h3><?php echo $total_buku; ?></h3>
          <h5 class="card-title">Buku yang ditambahkan</h5>
        </div>
      </div>

      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/userb.png" alt="Card image cap" style="width: 50%;">
          <?php
          $select_user_biasa = mysqli_query($mysqli, "SELECT * FROM `user` WHERE tipe_akun = 'user'") or die('query gagal');
          $total_user = mysqli_num_rows($select_user_biasa);
          ?>
          <h3><?php echo $total_user; ?></h3>
          <h5 class="card-title">Total Pengguna Biasa</h5>
        </div>
      </div>

      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/admin.png" alt="Card image cap" style="width: 50%;">
          <?php
          $select_admin = mysqli_query($mysqli, "SELECT * FROM `user` WHERE tipe_akun = 'admin'") or die('query gagal');
          $total_admin = mysqli_num_rows($select_admin);
          ?>
          <h3><?php echo $total_admin; ?></h3>
          <h5 class="card-title">Total Admin</h5>
        </div>
      </div>

      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/user.png" alt="Card image cap" style="width: 50%;">
          <?php
          $select_pengguna = mysqli_query($mysqli, "SELECT * FROM `user`") or die('query gagal');
          $total_pengguna = mysqli_num_rows($select_pengguna);
          ?>
          <h3><?php echo $total_pengguna; ?></h3>
          <h5 class="card-title">Total Pengguna</h5>
        </div>
      </div>

      <div class="card col-3" style="display: inline-block;">
        <div class="card-body">
          <img src="/PortalBuku-4One/resources/img/message.png" alt="Card image cap" style="width: 50%;">
          <?php
          $select_pesan = mysqli_query($mysqli, "SELECT * FROM `pesan`") or die('query gagal');
          $total_admin = mysqli_num_rows($select_pesan);
          ?>
          <h3><?php echo $total_admin; ?></h3>
          <h5 class="card-title">Total Pesan</h5>
        </div>
      </div>
    </div>
  </div>


  <!--<div class="col-md-2 ms-auto">
          <a class="btn btn-lg" href="#" role="button">Tambah data</a>
        </div>-->

  <!--</div>
    </div>-->
  <!-- /#page-content-wrapper -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
      el.classList.toggle("toggled");
    };
  </script>

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