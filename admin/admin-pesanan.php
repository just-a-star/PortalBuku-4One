<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$admin_id = $_SESSION['id_admin'];

if(!isset($admin_id)){
  header("Location: ../index.php");
}
;

if(isset($_POST['update_order'])){
  $update_id_pesan = $_POST['order_id'];
  $update_status_pembayaran = $_POST['status_pembayaran'];

  mysqli_query($mysqli, "UPDATE `order` SET status_pembayaran = '$update_status_pembayaran' WHERE id = '$update_id_pesan'") or die(mysqli_error($mysqli));

  $message['success'] = "Pesanan berhasil diupdate";
}
if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `order` WHERE id = '$delete_id'") or die(mysqli_error($mysqli));
  header('location:admin_pesanan.php');
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

  <section class="pesanan">
    <div class="container-fluid px-5">
    <h1 style="text-align: center;">Pesanan yang ditambahkan oleh user</h1>
    <div class="box-container">
      <?php
      $select_pesanan = mysqli_query($mysqli, "SELECT * FROM `order`") or die(mysqli_error($mysqli));
      if(mysqli_num_rows($select_pesanan) > 0){
        while($fetch_pesanan = mysqli_fetch_array($select_pesanan)){
      ?>
      <div class="box">
        <p>ID user : <span><?php echo $fetch_pesanan['user_id']; ?></span> </p>
        <p> placed on : <span><?php echo $fetch_pesanan['placed_on']; ?></span> </p>
        <p> Nama : <span><?php echo $fetch_pesanan['nama']; ?></span> </p>
        <p> Nomor Telepon : <span><?php echo $fetch_pesanan['nomor_telepon']; ?></span> </p>
        <p> Email : <span><?php echo $fetch_pesanan['email']; ?></span> </p>
        <p> Alamat : <span><?php echo $fetch_pesanan['alamat']; ?></span> </p>
        <p> Total Produk : <span><?php echo $fetch_pesanan['total_produk']; ?></span> </p>
        <p> Total Harga : <span>$<?php echo $fetch_pesanan['total_harga']; ?>/-</span> </p>
        <p> payment method : <span><?php echo $fetch_pesanan['metode_pembayaran']; ?></span> </p>
        <form action="" method="post">
          <input type="hidden" name="order_id" value="<?php echo $fetch_pesanan['id']; ?>">
          <select name="status_pembayaran">
            <option value="" selected disabled><?php echo $fetch_pesanan['status_pembayaran']; ?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
          </select>
          <input type="submit" value="update" name="update_order" class="option-btn">
          <a href="admin-pesanan.php?delete=<?php echo $fetch_pesanan['id']; ?>"
            onclick="return confirm('hapus pesananan ini?');" class="delete-btn">Hapus</a>
        </form>
      </div>

    </div>
    </div>
    <?php
        }
      }else{
        echo '<p class="kosong">Tidak ada pesanan</p>';
      }?>
  </section>

  <!-- Link javascript admin -->
  <script src=""></script>
</body>

</html>