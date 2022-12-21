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

if(isset($_POST['update_cart'])){
  $cart_id = $_POST['cart_id'];
  $cart_quantity = $_POST['jumlah_buku'];
  mysqli_query($conn, "UPDATE `cart` SET kuantitas = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
  $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
  header('location:/PortalBuku-4One/user/user_cart.php');
}

if(isset($_GET['delete_all'])){
  mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
  header('location:/PortalBuku-4One/user/user_cart.php');
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
  <?php include "../header.php"; ?>

  <section class="shopping-cart">

    <h1 class="title">products added</h1>

    <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
        <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times"
          onclick="return confirm('delete this from cart?');"></a>
        <img src="../resources/gambar_upload/<?php echo $fetch_cart['gambar']; ?>" alt="">
        <div class="name"><?php echo $fetch_cart['nama']; ?></div>
        <div class="price">$<?php echo $fetch_cart['harga_sewa']; ?>/-</div>
        <form action="" method="post">
          <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
          <input type="number" min="1" name="jumlah_buku" value="<?php echo $fetch_cart['kuantitas']; ?>">
          <input type="submit" name="update_cart" value="update" class="option-btn">
        </form>
        <div class="sub-total"> sub total :
          <span>$<?php echo $sub_total = ($fetch_cart['kuantitas'] * $fetch_cart['harga_sewa']); ?>/-</span>
        </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
    </div>

    <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>"
        onclick="return confirm('delete all from cart?');">delete all</a>
    </div>

    <div class="cart-total">
      <p>grand total : <span>$<?php echo $grand_total; ?>/-</span></p>
      <div class="flex">
        <a href="/PortalBuku-4One/user/user_sewaBuku.php" class="option-btn">continue shopping</a>
        <a href="/PortalBuku-4One/user/user_checkout.php"
          class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to
          checkout</a>
      </div>
    </div>

  </section>