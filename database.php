<?php

$host = "localhost";
$dbname = "portal_buku";
$username = "root";
$password = "";
$port = 3307;


$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname,
                     port: $port
                    );
                     

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
return $mysqli;