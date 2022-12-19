<?php
session_start();
include "../connection/database.php";
include "../connection/connection.php";

$admin_id = $_SESSION['id_admin'];

// if(!isset($admin_id)){
//   header("Location: ../index.php");
// }
;
if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `pesan` WHERE id = '$delete_id'") or die('query failed');
  header("Location: admin-pesan.php");
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
  <section class="container-pesan">
    <h1 class="title">Pesan</h1>
    <div class="box-container">
      <?php
    $select_pesan = mysqli_query($mysqli, "SELECT * FROM pesan") or die(mysqli_error($mysqli));
    if(mysqli_num_rows($select_pesan) > 0){
      while($fetch_pesan = mysqli_fetch_array($select_pesan)){
    ?>
    </div>
    <div class="box">
      <p> user id : <span><?php echo $fetch_pesan['user_id']; ?></span> </p>
      <p> name : <span><?php echo $fetch_pesan['nama']; ?></span> </p>
      <p> number : <span><?php echo $fetch_pesan['nomor']; ?></span> </p>
      <p> email : <span><?php echo $fetch_pesan['email']; ?></span> </p>
      <p> pesan : <span><?php echo $fetch_pesan['pesan']; ?></span> </p>
      <a href="admin-pesan.php?delete=<?php echo $fetch_pesan['id']; ?>" onclick="return confirm('Hapus pesan ini?');"
        class="delete-btn">delete message</a>
    </div>
    <?php
      };
   }else{
      echo '<p class="empty">Tidak ada pesan apa-apa!</p>';
   }
   ?>


</body>