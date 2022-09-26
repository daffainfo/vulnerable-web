<?php
	session_start();

	if($_SESSION["status_login_admin"] != "true") {
		header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
	}

	include '../config.php';

	$id = $_GET['id'];

	$query = "DELETE FROM news WHERE id='$id'";

	mysqli_query($conn, $query);

	header("Location: tables.php?file=list-news.php");
?>