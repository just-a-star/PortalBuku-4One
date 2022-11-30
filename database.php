<?php

$host = "localhost";
$dbname = "login_db";
$username = "SJKUSER";
$password = "21523283";
$port = "3306"; 

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname,
                     port: $port);
                     

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
return $mysqli;