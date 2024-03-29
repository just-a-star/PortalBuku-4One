<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- <link rel="stylesheet" href="styleAD.css" /> -->
  <title>Dashboard</title>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 second-text fs-4 fw-bold text-uppercase border-bottom">
        PortalBuku.id</div>
      <div class="list-group list-group-flush my-3">
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Data
          Admin</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Data
          Donatur</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Data
          Penyewa</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Data
          Penerima</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fas fa-map-marker-alt me-2"></i>Outlet</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fas fa-power-off me-2"></i>Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
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
      </nav>

      <div class="container-fluid px-5">
        <div class="row g-3 my-2">
          <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">720</h3>
                <p class="fs-5">Donasi</p>
              </div>
              <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>

          <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">4920</h3>
                <p class="fs-5">Sewa Buku</p>
              </div>
              <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>

          <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">3899</h3>
                <p class="fs-5">Minta Buku</p>
              </div>
              <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>

          <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">%25</h3>
                <p class="fs-5">Increase</p>
              </div>
              <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>
        </div>

        <!-- <div class="row my-5">
          <h3 class="fs-4 mb-3">Data Admin</h3>
          <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
              <thead>
                <tr>
                  <th scope="col" width="50">#</th>
                  <th scope="col">id Admin</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>ayshchaa</td>
                  <td>Aisya H</td>
                  <td>icaa@gmail.com</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>jae</td>
                  <td>JaePark</td>
                  <td>eaj@gmail.com</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> -->
        <div class="col-md-2 ms-auto">
          <a class="btn btn-lg" href="#" role="button">Tambah data</a>
        </div>

      </div>
    </div>
  </div>
  <!-- /#page-content-wrapper -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  var el = document.getElementById("wrapper");
  var toggleButton = document.getElementById("menu-toggle");

  toggleButton.onclick = function() {
    el.classList.toggle("toggled");
  };
  </script>
</body>

</html>