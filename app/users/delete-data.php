<?php

	include '../config.php';

	$id = $_GET['id'];
	$id = mysqli_real_escape_string($conn, $id);

	$query = "DELETE FROM daftar_barang WHERE id='$id'";

	mysqli_query($conn, $query);

	header("Location: dashboard.php");
?>