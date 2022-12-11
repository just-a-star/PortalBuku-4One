<?php

$host = "localhost";
$dbname = "portal_buku_new";
$username = "root";
$password = "";


$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname
                    );
                     

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
return $mysqli;