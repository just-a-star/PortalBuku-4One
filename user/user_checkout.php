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
$user_nama_belakang = $_SESSION["nama_belakang"];
$no_telp = $_SESSION["no_telepon"];
$email = $_SESSION["email"];


if (!isset($user_id)) {
  header("Location: ../index.php");
}

if (isset($_POST['order_btn'])) {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $number = $_POST['number'];
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $method = mysqli_real_escape_string($conn, $_POST['method']);
  $address = mysqli_real_escape_string($conn, 'flat no. ' . $_POST['flat'] . ', ' . $_POST['street'] . ', ' . $_POST['city'] . ', ' . ' - ' . $_POST['pin_code']);
  $placed_on = date('d-M-Y');
  $total_products = mysqli_real_escape_string($conn, $_POST['total_produk']);
  // $echo alert($total_products);
  $cart_total = 0;
  $id = 0;
  $cart_products[] = '';

  $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
  if (mysqli_num_rows($cart_query) > 0) {
    while ($cart_item = mysqli_fetch_assoc($cart_query)) {
      $cart_products[] = $cart_item['nama'] . ' (' . $cart_item['kuantitas'] . ') ';
      $sub_total = ($cart_item['harga_sewa'] * $cart_item['kuantitas']);
      $cart_total += $sub_total;
    }
  }

  $total_products = implode(', ', $cart_products);

  $order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE nama = '$name' AND nomor_telepon = '$number' AND email = '$email' AND metode_pembayaran = '$method' AND alamat = '$address' AND total_produk = '$total_products' AND total_harga = '$cart_total'") or die('query failed');

  if ($cart_total == 0) {
    $message[] = 'your cart is empty';
  } else {
    if (mysqli_num_rows($order_query) > 0) {
      $message[] = 'order already placed!';
    } else {
      mysqli_query($conn, "INSERT INTO `order`(user_id, nama, nomor_telepon, email, metode_pembayaran, alamat, total_produk, total_harga, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
      $message[] = 'order placed successfully!';
      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

      echo '<script language="javascript">';
      echo 'alert("checkout berhasil")';
      echo '</script>';
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
        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="width: 100%;">
            <div class="heading">
                <h1>Checkout</h1>
            </div>

            <section class="display-order">
                <h2>Rincian Sewa</h2>
                <?php
        $grand_total = 0;
        $total_kuantitas = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select_cart) > 0) {
          while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $total_price = ($fetch_cart['harga_sewa'] * $fetch_cart['kuantitas']);
            $grand_total += $total_price;
            $total_kuantitas += $fetch_cart['kuantitas'];
            $id = $fetch_cart['id'];
            ?>
                <p>
                    <?php echo $fetch_cart['nama']; ?>
                    <span><?php echo 'Rp ' . $fetch_cart['harga_sewa'] . ' Jumlah ' . $fetch_cart['kuantitas']; ?></span>
                </p>
                <?php
          }
        } else {
          echo '<p class="empty">Keranjangmu kosong</p>';
        }
        ?>
                <div class="grand-total"> Harga total : <span>Rp <?php echo $grand_total; ?></span> </div>
                <div class="grand-total"> Total kuantitas buku : <?php echo $total_kuantitas; ?></span> </div>

            </section>

            <section class="checkout">
                <form action="" method="post">
                    <h3>Silahkan isi formulir berikut:</h3>
                    <br>
                    <div class="flex" style="text-align: justify;">
                        <div class="inputBox">
                            <span>Nama: </span>
                            <input type="text" name="name"
                                value="<?php echo $user_nama_depan . ' ' . $user_nama_belakang?>">
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Nomor telpon:</span>
                            <input type="number" name="number" value="<?php echo $no_telp?>">
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Email:</span>
                            <input type="email" name="email" value="<?php echo $email?>">
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Metode Pembayaran:</span>
                            <select name="method">
                                <option value="cash on delivery">cash on delivery</option>
                                <option value="credit card">credit card</option>
                                <option value="paypal">paypal</option>
                                <option value="paytm">gopay</option>
                                <option value="paytm">dana</option>
                            </select>
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Alamat:</span>
                            <input type="text" min="0" name="flat" required placeholder="e.g. nama jalan">
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Detail Alamat :</span>
                            <input type="text" name="street" required placeholder="e.g. nama gedung">
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Kota :</span>
                            <input type="text" name="city" required placeholder="e.g. Yogyakarta">
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Provinsi :</span>
                            <input type="text" name="state" required placeholder="e.g. DIY">
                        </div>
                        <br>
                        <div class="inputBox">
                            <span>Kode Pos :</span>
                            <input type="number" min="0" name="pin_code" required placeholder="e.g. 214123">
                        </div>
                        <br>
                    </div>
                    <input hidden type="text" name="total_produk" value=<?php echo $total_kuantitas?>>
                    <!-- <input hidden type="text" value=<?php echo $id?>> -->
                    <input type="submit" name="order_btn" value="Sewa Sekarang" class="btn btn-primary">
        </div>

        </form>

        </section>
    </div>

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