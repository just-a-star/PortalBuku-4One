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

if (isset($_SESSION["user_id"])) {
  $mysqli = require("..\connection\database.php");

  $sql = "SELECT * FROM user
          WHERE id = {$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
}

if (!isset($user_id)) {
  header("Location: ../index.php");
}

if (isset($_POST['update_cart'])) {
  $cart_id = $_POST['cart_id'];
  $cart_quantity = $_POST['jumlah_buku'];
  mysqli_query($conn, "UPDATE `cart` SET kuantitas = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
  $message[] = 'cart quantity updated!';
}

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
  header('location:/PortalBuku-4One/user/user_cart.php');
}

if (isset($_GET['delete_all'])) {
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
  <link href="\PortalBuku-4One\resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="/PortalBuku-4One/css/style_admin.css" />
  <!-- <link rel="stylesheet" href="styleAD.css" /> -->
  <title>Dashboard</title>
</head>

<body>

  <?php include '..\header_logged.php'; ?>

  <section class="container">
    <div class="row">
      <br>
      <h1>Keranjang Kamu</h1>
      <br>
      <div class="card col-8">
        <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select_cart) > 0) {
          while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            ?>
            <div class="card-body">
              <div class="box">
                <div class="row">
                  <div class="col-2">
                    <img src="../resources/gambar_upload/<?php echo $fetch_cart['gambar']; ?>" alt="" width="80%">
                  </div>
                  <div class="col-4">
                    <div class="name">
                      <h3>
                        <?php echo $fetch_cart['nama']; ?>
                      </h3>
                    </div>
                    <h5>Harga:
                      <div class="price">Rp
                        <?php echo $fetch_cart['harga_sewa']; ?>
                      </div>
                    </h5>
                  </div>
                  <div class="col" style="text-align: center; ;">
                    <form action="" method="post">
                      <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                      <input type="number" min="1" name="jumlah_buku" value="<?php echo $fetch_cart['kuantitas']; ?>">
                      <input type="submit" name="update_cart" value="update" class="option-btn">
                    </form>
                    <a href="user_cart.php?delete=<?php echo $fetch_cart['id']; ?>"
                      onclick="return confirm('delete this from cart?');">
                      <img src="/PortalBuku-4One/resources/gambar/trash.svg" alt="Sampah" width="20%" height="50%" /></a>
                  </div>
                  <div class="col" style="text-align: center; ;">
                    Sub total : Rp<?php echo $sub_total = ($fetch_cart['kuantitas'] * $fetch_cart['harga_sewa']); ?>
                  </div>
                  <?php
                  $grand_total += $sub_total;
          }
        } else {
          echo '<p class="empty">Keranjangmu kosong</p>';
        }
        ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="col md-auto">
      <div class="card col-11">
        <div class="card-header">Rincian sewa</div>
        <div class="card-body">
          <p>Total Harga Sewa : <span>Rp
              <?php echo $grand_total; ?>
            </span></p>
          <br>
          <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"
            onclick="return confirm('Hapus semua dari keranjang?');">Hapus semua</a>
        </div>
      </div>
    </div>
    </section>
<br>
    <section class="container">
    <div class="row">
      <div class="col-2">
        <button onclick="document.location='/PortalBuku-4One/user/user_sewaBuku.php'" type="button"
          class="btn btn-primary btn-blok">Lanjut Menjelajah Buku</button>
      </div>
      <div class="col-2">
        <button onclick="document.location='/PortalBuku-4One/user/user_checkout.php'" type="button"
          class="btn btn-primary btn-blok">Sewa sekarang</button>
      </div>
    </div>
    </section>

    




    <!-- <div class="flex">
      <a href="/PortalBuku-4One/user/user_sewaBuku.php" class="option-btn">continue shopping</a>
      <a href="/PortalBuku-4One/user/user_checkout.php"
        class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to
        checkout</a>
    </div> -->

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