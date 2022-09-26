<?php
	session_start();

	if($_SESSION["status_login_admin"] != "true") {
		header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
	}

	include '../config.php';

	$id = $_GET['id'];
	$id = mysqli_real_escape_string($conn, $id);

	$query = "DELETE FROM daftar_barang WHERE id='$id'";

	mysqli_query($conn, $query);

	header("Location: tables.php?file=list-barang.php");
?>