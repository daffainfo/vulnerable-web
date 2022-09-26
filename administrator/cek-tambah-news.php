<?php
	session_start();
	
	include '../config.php';

	if($_SESSION["status_login_admin"] != "true") {
		header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
	}

	$judul = $_POST['judul'];
	$deskripsi = $_POST['deskripsi'];

	$judul = mysqli_real_escape_string($conn, $judul);
	$deskripsi = mysqli_real_escape_string($conn, $deskripsi);

	if(empty($judul) || empty($deskripsi)) {
		header("Location: tambah_data.php?pesan=empty_form");
	} else {

	$query = "INSERT INTO news VALUES ('', '$judul','$deskripsi')";
	$data = mysqli_query($conn, $query);

	if ($data > 0) {
		echo '<script>alert("Input data berhasil")</script>';
		header("Location: tables.php?file=list-news.php");
	} else {
		echo '<script>alert("Input data gagal")</script>';
	}
}

?>