<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$admin_id = $_SESSION['id_admin'];

if(!isset($admin_id)){
  header("Location: ../index.php");
}
;
if(isset($_POST['tambah_buku'])){
  $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
  $kategori = mysqli_real_escape_string($mysqli, $_POST['kategori']);
  $penulis = mysqli_real_escape_string($mysqli, $_POST['penulis']);
  $penerbit = mysqli_real_escape_string($mysqli, $_POST['penerbit']);
  $gambar = $_FILES['gambar']['nama'];
  $size_gambar = $_FILES['gambar']['size'];
  $folder_gambar = 'resources/img/'.$gambar;
  $deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);
  $harga = mysqli_real_escape_string($mysqli, $_POST['harga_sewa']);

  $select_nama_buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE nama_buku = '$nama'") or die("data salah: " . mysqli_error($mysqli));

  if(mysqli_num_rows($select_nama_buku) > 0){
    echo "<script>alert('Nama buku sudah ada!'); window.location.href='admin-produk.php';</script>";
  }else{
    if($size_gambar < 1000000){
      if(move_uploaded_file($_FILES['gambar']['tmp_name'], $folder_gambar)){
        $tambah_buku_query = mysqli_query($mysqli, "INSERT INTO buku (nama_buku, kategori, penulis, penerbit, gambar, deskripsi, harga_sewa) VALUES ('$nama', '$kategori', '$penulis', '$penerbit', '$gambar', '$deskripsi', '$harga')") or die("data salah: " . mysqli_error($mysqli));
        if($tambah_buku_query){
          echo "<script>alert('Buku berhasil ditambahkan!'); window.location.href='admin-produk.php';</script>";
        }else{
          echo "<script>alert('Buku gagal ditambahkan!'); window.location.href='admin-produk.php';</script>";
        }
      }else{
        echo "<script>alert('Gambar gagal diupload!'); window.location.href='admin-produk.php';</script>";
      }
    }else{
      echo "<script>alert('Ukuran gambar terlalu besar!'); window.location.href='admin-produk.php';</script>";
    }
  }
}
if(isset($_POST['edit_buku'])){
  $id = mysqli_real_escape_string($mysqli, $_POST['id']);
  $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
  $kategori = mysqli_real_escape_string($mysqli, $_POST['kategori']);
  $penulis = mysqli_real_escape_string($mysqli, $_POST['penulis']);
  $penerbit = mysqli_real_escape_string($mysqli, $_POST['penerbit']);
  $gambar = $_FILES['gambar']['nama'];
  $size_gambar = $_FILES['gambar']['size'];
  $folder_gambar = 'resources/img/'.$gambar;
  $deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);
  $harga = mysqli_real_escape_string($mysqli, $_POST['harga_sewa']);

  $select_nama_buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE nama_buku = '$nama'") or die("data salah: " . mysqli_error($mysqli));

  if(mysqli_num_rows($select_nama_buku) > 0){
    echo "<script>alert('Nama buku sudah ada!'); window.location.href='admin-produk.php';</script>";
  }else{
    if($size_gambar < 1000000){
      if(move_uploaded_file($_FILES['gambar']['tmp_name'], $folder_gambar)){
        $edit_buku_query = mysqli_query($mysqli, "UPDATE buku SET nama_buku = '$nama', kategori = '$kategori', penulis = '$penulis', penerbit = '$penerbit', gambar = '$gambar', deskripsi = '$deskripsi', harga_sewa = '$harga' WHERE id_buku = '$id'") or die("data salah: " . mysqli_error($mysqli));
        if($edit_buku_query){
          echo "<script>alert('Buku berhasil diubah!'); window.location.href='admin-produk.php';</script>";
        }else{
          echo "<script>alert('Buku gagal diubah!'); window.location.href='admin-produk.php';</script>";
        }
      }else{
        echo "<script>alert('Gambar gagal diupload!'); window.location.href='admin-produk.php';</script>";
      }
    }else{
      echo "<script>alert('Ukuran gambar terlalu besar!'); window.location.href='admin-produk.php';</script>";
    }
  }
}
if(isset($_POST['hapus_buku'])){
  $id = mysqli_real_escape_string($mysqli, $_POST['id']);
  $hapus_buku_query = mysqli_query($mysqli, "DELETE FROM buku WHERE id_buku = '$id'") or die("data salah: " . mysqli_error($mysqli));
  if($hapus_buku_query){
    echo "<script>alert('Buku berhasil dihapus!'); window.location.href='admin-produk.php';</script>";
  }else{
    echo "<script>alert('Buku gagal dihapus!'); window.location.href='admin-produk.php';</script>";
  }
}
if(isset($_POST['tambah_kategori'])){
  $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
  $tambah_kategori_query = mysqli_query($mysqli, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')") or die("data salah: " . mysqli_error($mysqli));
  if($tambah_kategori_query){
    echo "<script>alert('Kategori berhasil ditambahkan!'); window.location.href='admin-kategori.php';</script>";
  }else{
    echo "<script>alert('Kategori gagal ditambahkan!'); window.location.href='admin-kategori.php';</script>";
  }
}
if(isset($_POST['edit_kategori'])){
  $id = mysqli_real_escape_string($mysqli, $_POST['id']);
  $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
  $edit_kategori_query = mysqli_query($mysqli, "UPDATE kategori SET nama_kategori = '$nama' WHERE id_kategori = '$id'") or die("data salah: " . mysqli_error($mysqli));
  if($edit_kategori_query){
    echo "<script>alert('Kategori berhasil diubah!'); window.location.href='admin-kategori.php';</script>";
  }else{
    echo "<script>alert('Kategori gagal diubah!'); window.location.href='admin-kategori.php';</script>";
  }
}
if(isset($_POST['hapus_kategori'])){
  $id = mysqli_real_escape_string($mysqli, $_POST['id']);
  $hapus_kategori_query = mysqli_query($mysqli, "DELETE FROM kategori WHERE id_kategori = '$id'") or die("data salah: " . mysqli_error($mysqli));
  if($hapus_kategori_query){
    echo "<script>alert('Kategori berhasil dihapus!'); window.location.href='admin-kategori.php';</script>";
  }else{
    echo "<script>alert('Kategori gagal dihapus!'); window.location.href='admin-kategori.php';</script>";
  }
}
if(isset($_POST['tambah_admin'])){
  $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);
  $tambah_admin_query = mysqli_query($mysqli, "INSERT INTO admin (nama_admin, email_admin, password_admin) VALUES ('$nama', '$email', '$password')") or die("data salah: " . mysqli_error($mysqli));
  if($tambah_admin_query){
    echo "<script>alert('Admin berhasil ditambahkan!'); window.location.href='admin-admin.php';</script>";
  }else{
    echo "<script>alert('Admin gagal ditambahkan!'); window.location.href='admin-admin.php';</script>";
  }
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
  <link rel="stylesheet" href="/4One/PortalBuku-4One/css/styleLP.css" />
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
      <div class="form-group">
        <label for="harga">Harga Sewa per hari</label>
        <input type="number" name="harga" id="harga" class="form-control" />
      </div>
      <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" class="form-control" />
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control" />
      </div>
      <div class="form-group">
        <button type="submit" name="tambah_produk" class="btn btn-primary">Tambah</button>
      </div>
      <!-- make add produk button -->





    </form>

  </section>



</body>