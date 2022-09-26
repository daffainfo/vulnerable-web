<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "miniproyek";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
  die("Connection failed");
}

?>