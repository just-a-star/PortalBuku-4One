<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$admin_id = $_SESSION['id_admin'];

if(!isset($admin_id)){
  header("Location: ../index.php");
}
;
if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  mysqli_query($mysqli, "DELETE FROM 'user' WHERE 'id' = '$delete_id'") or die(mysqli_error($mysqli));
  header("Location: admin-data-user.php");
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

  <section class="users">
    <h1 class="title">User accounts</h1>

    <div class="box-container">
      <?php
       $select_user = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error($mysqli));
       while($fetch_user = mysqli_fetch_array($select_user)){
        ?>
      <div class="box">
        <p> ID user : <span><?php echo $fetch_user['id']; ?></span> </p>
        <p> Nama : <span><?php echo $fetch_user['nama_depan'] 
        . " " . $fetch_user['nama_belakang'];
         
        ?></span> </p>
        <p> Email : <span><?php echo $fetch_user['email']; ?></span> </p>
        <p> Tipe user : <span
            style="color:<?php if($fetch_user['tipe_akun'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_user['tipe_akun']; ?></span>
        </p>
        <p>Nomor telepon : <span><?php echo $fetch_user['no_telepon'];?>
          </span></p>
        <p>Alamat : <span><?php echo $fetch_user['alamat'];?></span></p>
        <a href="admin_users.php?delete=<?php echo $fetch_user['id']; ?>" onclick="return confirm('delete this user?');"
          class="delete-btn">delete user</a>
      </div>
      <?php
       };
       ?>
    </div>
  </section>

</body>