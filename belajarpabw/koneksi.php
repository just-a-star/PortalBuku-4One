<?php

$host = "localhost";
$dbname = "sdm";
$username = "root";
$password = "";
$port = 3307;


$koneksi = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname,
                     port: $port
                    );

if ($koneksi->connect_error) {
    die("Koneksi gagal : " . $koneksi->connect_error . " <br>");
}
echo "Koneksi sukses. <br >";

$sql = "SELECT employee_id, first_name, last_name FROM employees";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["employee_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
  }
} else {
  echo "0 results";
}
$koneksi->close();

?>