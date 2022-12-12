<?php


if (empty($_POST["nama_depan"])) {
    die("Nama depan tidak boleh kosong");
}

if (empty($_POST["nama_belakang"])) {
    die("Nama belakang tidak boleh kosong");
}

if (preg_match("/[a-z]/i", $_POST["no_telepon"])) {
    die("Nomor telepon tidak valid");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Email tidak valid");
}

if (empty($_POST["alamat"])) {
    die("Alamat tidak boleh kosong");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["konfirmasi_password"]) {
    die("Passwords must match");
}




// if (empty($_POST["name"])) {
//     die("Name is required");
// }

// if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
//     die("Valid email is required");
// }

// if (strlen($_POST["password"]) < 8) {
//     die("Password must be at least 8 characters");
// }

// if (!preg_match("/[a-z]/i", $_POST["password"])) {
//     die("Password must contain at least one letter");
// }

// if (!preg_match("/[0-9]/", $_POST["password"])) {
//     die("Password must contain at least one number");
// }

// if ($_POST["password"] !== $_POST["password_confirmation"]) {
//     die("Passwords must match");
// }

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (nama_depan, nama_belakang, no_telepon, alamat, email, password_hash)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error:" . $mysqli->error);
}

$stmt->bind_param("ssisss", $_POST["nama_depan"], $_POST["nama_belakang"], $_POST["no_telp"], $_POST["alamat"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
    header("Location: sign-up-berhasil.html");

} else {
    echo "SQL error:" . $mysqli->error;
    // if ($mysqli->errno === 1062) {
    //     die("Email already exists");
    // } else {
    //     die("SQL error:" . $mysqli->error . " " . $mysqli->errno);
    // }

}