<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blueolz8_blueocean";
// error_reporting(0);
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>