<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

// $_SESSION["user_id"] = $user["id"];
// $_SESSION["nama_depan"] = $user["nama_depan"];
// $_SESSION["nama_belakang"] = $user["nama_belakang"];
// $_SESSION["no_telepon"] = $user["no_telepon"];
// $_SESSION["email"] = $user["email"];
// $_SESSION["alamat"] = $user["alamat"];
// $_SESSION["password"] = $user["password"];
$user_id = $_SESSION['user_id'];
$user_nama_depan = $_SESSION['nama_depan'];


if(!isset($user_id)){
  header("Location: ../index.php");
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
  <link rel="stylesheet" href="/PortalBuku-4One/css/style_admin.css" />
  <!-- <link rel="stylesheet" href="styleAD.css" /> -->
  <title>Dashboard</title>
</head>

<body>
  <?php include "../header_logged.php"; ?>

  <div class=container>
  <div class="heading">
    <h3>Orderan kamu</h3>
    <p> <a href="home.php">home</a> / orders </p>
  </div>

  <section class="placed-orders">

    <h1 class="title">Buku yang sedang disewa</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="kartu card">
      <div class="card-body">
        <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> name : <span><?php echo $fetch_orders['nama']; ?></span> </p>
        <p> number : <span><?php echo $fetch_orders['nomor_telepon']; ?></span> </p>
        <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> address : <span><?php echo $fetch_orders['alamat']; ?></span> </p>
        <p> payment method : <span><?php echo $fetch_orders['metode_pembayaran']; ?></span> </p>
        <p> your orders : <span><?php echo $fetch_orders['total_produk']; ?></span> </p>
        <p> total price : <span>$<?php echo $fetch_orders['total_harga']; ?>/-</span> </p>
        <p> payment status : <span
            style="color:<?php if($fetch_orders['status_pembayaran'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['status_pembayaran']; ?></span>
        </p>
      </div>
      </div>
                <!-- </div> -->
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
    </div>
  </div>
  

  </section>