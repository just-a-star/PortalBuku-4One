<?php

session_start();

if (isset($_SESSION["user_id"])) {
  $mysqli = require __DIR__ . "/database.php";

  $sql = "SELECT * FROM user
          WHERE id = {$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

  <h1>Homepage</h1>
  <?php if (isset($user)): ?>
  <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
  <p> You are logged in. </p>

  <p><a href="logout.php">Log out</a></p>

  <?php else: ?>

  <p><a href="login.php">Log in</a> or <a href="sign-up.html">Sign up</a></p>

  <?php endif; ?>


</body>

</html>