<?php
$username = "your_username";
$password = "your_pass";
$database = "your_db";

$host = "localhost";
$dbname = "fourone";
$username = "root";
$password = "";
$port = "3307"; 

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname,
                     port: $port);

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }                     
// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.

// $field1 = $mysqli->real_escape_string($_POST['field1']);
$field2 = $mysqli->real_escape_string($_POST['field2']);
$field3 = $mysqli->real_escape_string($_POST['field3']);


$query = "INSERT INTO table_name (col1, col2, col3)
            VALUES ('{$field1}','{$field2}','{$field3}')";

$mysqli->query($query);
$mysqli->close();