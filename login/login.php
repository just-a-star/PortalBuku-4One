<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $mysqli = require("../connection/database.php");

  $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
    $mysqli->real_escape_string($_POST["email"])
  );

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();

  if ($user) {

    if (password_verify($_POST["password"], $user["password_hash"])) {

      if ($user["tipe_akun"] == "admin") {
        session_start();

        session_regenerate_id();

        $_SESSION["id_admin"] = $user["id"];
        $_SESSION["nama_admin"] = $user["nama_depan"];
        $_SESSION["email_admin"] = $user["email"];

        header("Location: /PortalBuku-4One/admin/admin-dashboard.php");
        exit;
      } else if ($user["tipe_akun"] == "user") {
        session_start();

        session_regenerate_id();

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nama_depan"] = $user["nama_depan"];
        $_SESSION["nama_belakang"] = $user["nama_belakang"];
        $_SESSION["no_telepon"] = $user["no_telepon"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["alamat"] = $user["alamat"];
        $_SESSION["password"] = $user["password"];

        header("Location: /PortalBuku-4One/homepage.php");
        exit;
      }
    }
  }

  $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <link href="\PortalBuku-4One\resources\bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/PortalBuku-4One/css/styleLP.css" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>

<body>

  <!-- Header -->
  <section class="header sticky-top">
    <nav class="navbar">
      <div class="container">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">Portal Buku.id</span>
        </div>
      </div>
    </nav>
  </section>

  <br>

  <section class="container">
    <div class="col">
      <!-- Account details card-->
      <div class="card mb-4">
        <div class="card-header">
          <h4>Sign In</h4>
        </div>
        <div class="card-body">
          <form method="post">
            <!-- Form Group (Email)-->
            <div class="mb-3">
              <label class="small mb-1" for="email">Email</label>
              <input class="form-control" id="email" name="email" type="email" placeholder="Masukkan email" value="">
            </div>
            <!-- Form Group (Password)-->
            <div class="mb-3">
              <label class="small mb-1" for="password">Password</label>
              <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password"
                value="">
              <input type="checkbox" onclick="passFunction()">Tampilkan Password
            </div>
            <!-- Save changes button-->
            <br>
            <button class="btn btn-primary" type="submit">Log In</button>
            <p>
              Belum punya akun?
              <a href="/PortalBuku-4One/register/sign-up.html">Sign Up Sekarang!</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- <h1>Login</h1> -->

  <?php if ($is_invalid): ?>
  <em>Invalid login</em>
  <?php endif; ?>

  <!-- <form method="post">
    <label for="email">email</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button>Log in</button>
  </form> -->
  <script>
  function passFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>
</body>

</html>