<?php
	session_start();

	if($_SESSION["status_login_admin"] != "true") {
		header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
	}

	include '../config.php';

	$id = $_POST['id'];
	$judul = $_POST['judul'];
	$deskripsi = $_POST['deskripsi'];

	$id = mysqli_real_escape_string($conn, $id);
	$judul = mysqli_real_escape_string($conn, $judul);
	$deskripsi = mysqli_real_escape_string($conn, $deskripsi);

	if(empty($judul) || empty($deskripsi)) {
		header("Location: edit_data.php?id=$id");
		echo '<script>alert("Input data terlebih dahulu")</script>';
	} else {

	$query = "UPDATE news SET judul='$judul',deskripsi='$deskripsi' WHERE id='$id'";

	$data = mysqli_query($conn, $query);

	if ($data > 0) {
		header("Location: tables.php?file=list-news.php");
	} else {
		echo '<script>alert("Edit data gagal")</script>';
	}
}

?>