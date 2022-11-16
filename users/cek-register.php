<?php

	session_start();

	include '../config.php';

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
	$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
		header("Location: register.php?pesan=password_false");
	} elseif (empty($name) || empty($username) || empty($no_telp)) {
		header("Location: register.php?pesan=empty_form");
	} else {
		$query = "INSERT INTO user (id, fullname, username, telephone_number, email, password, image)
					VALUES (
						NULL,
						'$name',
						'$username',
						'$no_telp',
						'$email',
						'$password',
						'$name_file'
				)";

		$data = mysqli_query($conn, $query);

		if ($data > 0) {
			header("Location: index.php?pesan=register_berhasil");
		} else {
			header("Location: register.php?pesan=register_gagal");
		}
	}
?>