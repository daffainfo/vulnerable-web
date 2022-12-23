<?php
	session_start();

	include '../config.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$redirect = $_POST['redirect'];

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	$query = "SELECT *
				FROM admin
				WHERE username = '$username' AND password = '$password'";

	$data = mysqli_query($conn, $query);

	$cek = mysqli_num_rows($data);

	if ($cek > 0) {
		$_SESSION["username_admin"] = $username;
		$_SESSION["status_login_admin"] = "true";
		header("Location: " . $redirect);
	} else {
		header("Location: index.php?redirect=dashboard.php&pesan=gagal");
	}

?>