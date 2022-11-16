<?php

	session_start();

	include '../config.php';

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
	$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if($_SESSION["status_login_user"] != "true") {
		header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
	}

	$query = "SELECT * FROM user WHERE username = '".$_SESSION["username_user"]."'";
	$data = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($data)) {
		$username_user = $row['username'];
		$image = $row['image'];
		unlink("uploads/".$image);
	}

	if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
		echo "The file " . basename($_FILES["myfile"]["name"]) . " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

	$name = $_POST['name'];
	$username = $_POST['username'];
	$no_telp = $_POST['phone_number'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	$name_file = $_FILES["myfile"]["name"];

	$name = mysqli_real_escape_string($conn, $name);
	$username = mysqli_real_escape_string($conn, $username);
	$no_telp = mysqli_real_escape_string($conn, $no_telp);
	$email = mysqli_real_escape_string($conn, $email);
	$password = mysqli_real_escape_string($conn, $password);
	$password_confirm = mysqli_real_escape_string($conn, $password_confirm);
	$name_file = mysqli_real_escape_string($conn, $name_file);

	if ($password != $password_confirm) {
		echo '<script>alert("Edit data gagal")</script>';
	} elseif (empty($name) || empty($username) || empty($no_telp) || empty($email) || empty($password) || empty($password_confirm)) {
		echo '<script>alert("Edit data gagal")</script>';
	} else {
		$query2 = "UPDATE user SET fullname='$name', username='$username', telephone_number='$no_telp', email='$email', image='$name_file' WHERE username='$username'";

		$data2 = mysqli_query($conn, $query2);

		if ($data2 > 0) {
			header("Location: dashboard.php");
		} else {
			echo '<script>alert("Edit data gagal")</script>';
		}
	}
?>