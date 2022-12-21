<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$admin_id = $_SESSION['id_admin'];

if (!isset($admin_id)) {
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
      echo "<script>alert('Nama buku sudah ada!'); window.location.href='admin-produk.php';</script>";
   } else {
      $tambah_buku_query = mysqli_query($mysqli, "INSERT INTO `buku` (nama, harga_sewa, deskripsi_singkat, gambar, genre, kategori, penulis, penerbit) VALUES ('$nama', '$harga_sewa', '$deskripsi_singkat', '$gambar', '$genre', '$kategori', '$penulis', '$penerbit')") or die("data salah: " . mysqli_error($mysqli));

      if ($tambah_buku_query) {
         if ($gambar_size > 2000000) {
            $pesan[] = "Ukuran gambar terlalu besar!";

         } else {
            move_uploaded_file($gambar_temp_name, $gambar_folder);
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='admin-produk.php';</script>";
         }

      } else {
         $pesan[] = "Produk tidak dapat ditambahkan!";
      }
   }
}

if (isset($_GET['hapus'])) {
   $id_delete = $_GET['hapus'];
   $delete_image_query = mysqli_query($mysqli, "SELECT gambar FROM `buku`
    WHERE id = '$id_delete'") or die("data salah: " . mysqli_error($mysqli));
   $fetch_gambar_dihapus = mysqli_fetch_assoc($gambar_dihapus_query);
   unlink('../resources/gambar_upload/' . $fetch_gambar_dihapus['gambar']);
   mysqli_query($mysqli, "DELETE FROM `buku` WHERE id = '$id_delete'") or die("data salah: " . mysqli_error($mysqli));
   header("Location: admin-produk.php");
}
if (isset($_POST['update_buku'])) {
   $update_buku_id = $_POST['update_buku_id'];
   $update_nama = mysqli_real_escape_string($mysqli, $_POST['update_nama']);
   $update_harga_sewa = mysqli_real_escape_string($mysqli, $_POST['update_harga_sewa']);
   $update_deskripsi_singkat = mysqli_real_escape_string($mysqli, $_POST['update_deskripsi_singkat']);
   $update_genre = mysqli_real_escape_string($mysqli, $_POST['update_genre']);
   $update_kategori = mysqli_real_escape_string($mysqli, $_POST['update_kategori']);
   $update_penulis = mysqli_real_escape_string($mysqli, $_POST['update_penulis']);
   $update_penerbit = mysqli_real_escape_string($mysqli, $_POST['update_penerbit']);


   $update_gambar = $_FILES['update_gambar']['nama'];
   $update_gambar_size = $_FILES['update_gambar']['size'];
   $update_gambar_temp_name = $_FILES['update_gambar']['tmp_name'];
   $update_gambar_folder = "../resources/gambar_upload/" . $update_gambar;
   $update_gambar_lama = $_POST['update_gambar_lama'];

   if (!empty($update_image)) {
      if ($update_gambar_size > 2000000) {
         $pesan[] = "Ukuran gambar terlalu besar!";
      } else {
         mysqli_query($mysql, "UPDATE `buku` SET gambar = '$update_gambar' WHERE id = '$update_buku_id'") or die("data salah: " . mysqli_error($mysqli));
         move_uploaded_file($update_gambar_temp_name, $update_gambar_folder);
         unlink('../resources/gambar_upload/' . $update_gambar_lama);
      }
   }
   header("Location: admin-produk.php");


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="..\resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <!-- <link rel="stylesheet" href="/PortalBuku-4One/css/style_admin.css" /> -->
   <link rel="stylesheet" href="/PortalBuku-4One/css/styleLP.css" />
   <!-- <link rel="stylesheet" href="styleAD.css" /> -->
   <title>Dashboard</title>
</head>

<body>
   <?php include "admin-header.php"; ?>
   <!-- <section class="menambahkan-buku">
    <h1>Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <h3>tambah buku</h3>
      <input type="text" name="nama" class="box" placeholder="masukkan nama buku" required>
      <input type="text" name="harga_sewa" class="box" placeholder="masukkan harga sewa" required>
      <input type="file" name="gambar" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="text" name="deskripsi_singkat" class="box" placeholder="masukkan deskripsi singkat" required>
      <input type="text" name="genre" class="box" placeholder="masukkan genre" required>
      <input type="text" name="kategori" class="box" placeholder="masukkan kategori" required>
      <input type="text" name="penulis" class="box" placeholder="masukkan penulis" required>
      <input type="text" name="penerbit" class="box" placeholder="masukkan penerbit" required>
      <input type="submit" value="tambah buku" name="tambah_buku" class="btn btn-primary">
    </form>
  </section> -->

   <div class="container">
      <div class="card">
         <section class="menambahkan-buku">
            <div class="card-header">
               <h3>Buku</h3>
            </div>
            <div class="card-body">
               <form action="" method="post" enctype="multipart/form-data">
                  <h4>Tambah buku</h4>
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
                     <input type="text" name="deskripsi_singkat" class="box" placeholder="Masukkan deskripsi singkat"
                        required>
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
                     <input type="file" name="gambar" accept="image/jpg, image/jpeg, image/png" class="box"
                        required><br>
                  </div>
                  <input type="submit" value="Tambah buku" name="tambah_buku" class="btn btn-primary">
               </form>
            </div>
         </section>
      </div>


      <!-- Dibawah ini untuk memperlihatkan produk buku2 yg sudah ditambahkan -->

      <section class="perlihatkan-buku">
         <div class="box-container">

            <?php
            $select_buku = mysqli_query($mysqli, "SELECT * FROM `buku`") or die("data salah: " . mysqli_error($mysqli));
            if (mysqli_num_rows($select_buku) > 0) {
               while ($fetch_buku = mysqli_fetch_assoc($select_buku)) {
            ?>
            <div class="card col-4" style="display: inline-block;">
               <div class="card-body">
                  <div class="box">
                     <img src="../resources/gambar_upload/<?php echo $fetch_buku['gambar']; ?>" alt=""
                        style="width: 50%;">
                     <div class="name"><?php echo $fetch_buku['nama'] ?></div>
                     <div class="harga">Rp. <?php echo $fetch_buku['harga_sewa'] ?></div>
                     <div class="deskripsi"><?php echo $fetch_buku['deskripsi_singkat'] ?></div>
                     <div class="genre"><?php echo $fetch_buku['genre'] ?></div>
                     <div class="kategori"><?php echo $fetch_buku['kategori'] ?></div>
                     <div class="penulis"><?php echo $fetch_buku['penulis'] ?></div>
                     <div class="penerbit"><?php echo $fetch_buku['penerbit'] ?></div>
                     <a href="admin-produk.php?hapus=<?php echo $fetch_buku['id']; ?>" class="btn btn-primary">Hapus
                        buku</a>
                  </div>
               </div>
            </div>
            <?php
               }
            } else {
               echo '<p>Belum ada buku</p>';
            }
            ?>


         </div>
      </section>

      <section class="edit-buku-form">
         <?php
         if (isset($_GET['update'])) {
            $id_update = $_GET['update'];
            $query_update = mysqli_query($mysqli, "SELECT * FROM `buku` WHERE id = '$id_update'") or die("data salah: " . mysqli_error($mysqli));
            if (mysqli_num_rows($query_update) > 0) {
               while ($fetch_update = mysqli_fetch_assoc($query_update)) {
         ?>
         <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="update_buku_id" value="<?php echo $fetch_update['id']; ?>">
            <input type="hidden" name="update_gambar_lama" value="<?php echo $fetch_update['gambar']; ?>">
            <img src="../resources/gambar_upload/<?php echo $fetch_update['gambar']; ?>" alt="">
            <input type="text" name="update_nama" class="box" placeholder="masukkan nama buku"
               value="<?php echo $fetch_update['nama']; ?>">
            <input type="text" name="update_harga_sewa" class="box" placeholder="masukkan harga sewa"
               value="<?php echo $fetch_update['harga_sewa']; ?>">
            <input type="text" name="update_deskripsi_singkat" class="box" placeholder="masukkan deskripsi singkat"
               value="<?php echo $fetch_update['deskripsi_singkat']; ?>">
            <input type="text" name="update_genre" class="box" placeholder="masukkan genre"
               value="<?php echo $fetch_update['genre']; ?>">
            <input type="text" name="update_kategori" class="box" placeholder="masukkan kategori"
               value="<?php echo $fetch_update['kategori']; ?>">
            <input type="text" name="update_penulis" class="box" placeholder="masukkan penulis"
               value="<?php echo $fetch_update['penulis']; ?>">
            <input type="text" name="update_penerbit" class="box" placeholder="masukkan penerbit"
               value="<?php echo $fetch_update['penerbit']; ?>">
            <input type="submit" value="update buku" name="update_buku" class="btn btn-primary">

            <input type="file" name="update_gambar" accept="image/jpg, image/jpeg, image/png" class="box">
            <input type="submit" value="update" name="update_gambar" class="btn btn-primary">
            <input type="submit" value="cancel" id="tutup-update" name="update_gambar" class="btn-opsi">

         </form>
         <?php
               }
            }
         } else {
            echo '<p>Belum ada buku</p>';

         }


         ?>
      </section>



      </form>

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