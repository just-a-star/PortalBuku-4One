<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$admin_id = $_SESSION['id_admin'];

if(!isset($admin_id)){
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
               $pesan[] = "Ukuran gambar terlalu besar!" ;
                  
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="/PortalBuku-4One/css/style_admin.css" />
  <!-- <link rel="stylesheet" href="styleAD.css" /> -->
  <title>Dashboard</title>
</head>

<body>
  <?php include "admin-header.php"; ?>
  <section class="tambah-produk">
    <h1>Portal buku produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <h3>tambah produk</h3>
      <div class="form-group">
        <label for="nama">Nama Buku</label>
        <input type="text" name="nama" id="nama" class="form-control" />
      </div>
      <div class="form-group">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" class="form-control">
          <option value="">Pilih Kategori</option>
          <?php
          $kategori_query = mysqli_query($mysqli, "SELECT `kategori` FROM `kategori`") or die("data salah: " . mysqli_error($mysqli));
          while($kategori = mysqli_fetch_array($kategori_query)){
          ?>
          <option value="<?php $kategori['kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
          <?php } ?>
        </select>
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



</body>

</html>