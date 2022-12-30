<?php
$servername = "127.0.0.1";
$username = "vulnerableweb";
$password = "vulnerableweb";
$databasename = "vulnweb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
  die("Connection failed");
}

?>