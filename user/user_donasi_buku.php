<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header("Location: ../index.php");
}
;
if (isset($_POST['tambah_buku'])) {
   $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
   $harga_sewa = mysqli_real_escape_string($mysqli, $_POST['harga_sewa']);
   $deskripsi_singkat = mysqli_real_escape_string($mysqli, $_POST['deskripsi_singkat']);
   $gambar = $_FILES['gambar']['name'];
   $gambar_size = $_FILES['gambar']['size'];
   $gambar_temp_name = $_FILES['gambar']['tmp_name'];
   $gambar_folder = "../resources/gambar_upload/" . $gambar;
   $genre = mysqli_real_escape_string($mysqli, $_POST['genre']);
   $kategori = mysqli_real_escape_string($mysqli, $_POST['kategori']);
   $penulis = mysqli_real_escape_string($mysqli, $_POST['penulis']);
   $penerbit = mysqli_real_escape_string($mysqli, $_POST['penerbit']);

   $select_nama_buku = mysqli_query($mysqli, "SELECT nama FROM `buku` WHERE nama = '$nama'") or die("data salah: " . mysqli_error($mysqli));

   if (mysqli_num_rows($select_nama_buku) > 0) {
      echo "<script>alert('Nama buku sudah ada!'); window.location.href='user_donasi_buku.php';</script>";
   } else {
      $tambah_buku_query = mysqli_query($mysqli, "INSERT INTO `buku` (nama, harga_sewa, deskripsi_singkat, gambar, genre, kategori, penulis, penerbit) VALUES ('$nama', '$harga_sewa', '$deskripsi_singkat', '$gambar', '$genre', '$kategori', '$penulis', '$penerbit')") or die("data salah: " . mysqli_error($mysqli));

      if ($tambah_buku_query) {
         if ($gambar_size > 2000000) {
            $pesan[] = "Ukuran gambar terlalu besar!";

         } else {
            move_uploaded_file($gambar_temp_name, $gambar_folder);
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='user_donasi_buku.php';</script>";
         }

      } else {
         $pesan[] = "Produk tidak dapat ditambahkan!";
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="\PortalBuku-4One\resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="/PortalBuku-4One/css/style_admin.css" />
  <!-- <link rel="stylesheet" href="styleAD.css" /> -->
  <title>Dashboard</title>
</head>

<body>
<?php include '..\header_logged.php'; ?>

  <div class="container">
    <div class="card">
      <section class="menambahkan-buku">
        <div class="card-header">
          <h3>Buku</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <h4>Masukkan keterangan buku yang ingin anda donasikan</h4>
            <h5>Mohon isikan formulir ini untuk pentingan verifikasi</h5>
            <div class="mb-auto">
              <label class="small mb-1" for="nama">Nama Buku</label><br>
              <input type="text" name="nama" class="box" placeholder="Masukkan nama buku" required>
            </div>
            <div class="mb-auto">
              <label class="small mb-1" for="harga_sewa">Harga Sewa</label><br>
              <input type="text" name="harga_sewa" class="box" placeholder="Masukkan harga sewa" required><br>
            </div>
            <div class="mb-auto">
              <label class="small mb-1" for="deskripsi_singkat">Deskripsi</label><br>
              <input type="text" name="deskripsi_singkat" class="box" placeholder="Masukkan deskripsi singkat" required>
            </div>
            <div class="mb-auto">
              <label class="small mb-1" for="genre">Genre</label><br>
              <input type="text" name="genre" class="box" placeholder="Masukkan genre" required><br>
            </div>
            <div class="mb-auto">
              <label class="small mb-1" for="kategori">Kategori</label><br>
              <input type="text" name="kategori" class="box" placeholder="Masukkan kategori" required><br>
            </div>
            <div class="mb-auto">
              <label class="small mb-1" for="penulis">Penulis</label><br>
              <input type="text" name="penulis" class="box" placeholder="Masukkan penulis" required><br>
            </div>
            <div class="mb-auto">
              <label class="small mb-1" for="penerbit">Penerbit</label><br>
              <input type="text" name="penerbit" class="box" placeholder="Masukkan penerbit" required><br>
            </div>
            <div class="mb-auto">
              <label class="small mb-1" for="gambar">Unggah gambar buku</label><br>
              <input type="file" name="gambar" accept="image/jpg, image/jpeg, image/png" class="box" required><br>
            </div>
            <input type="submit" value="Tambah buku" name="tambah_buku" class="btn btn-primary">
          </form>
        </div>
      </section>
    </div>