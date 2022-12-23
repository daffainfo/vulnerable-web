<?php
	session_start();

	if($_SESSION["status_login_user"] != "true") {
		header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
	}

	include '../config.php';

	$id = $_POST['id'];
	$nama_barang = $_POST['nama_barang'];
	$kuantitas = $_POST['kuantitas'];
	$created_by = $_POST['created_by'];

	$id = mysqli_real_escape_string($conn, $id);
	$nama_barang = mysqli_real_escape_string($conn, $nama_barang);
	$kuantitas = mysqli_real_escape_string($conn, $kuantitas);

	if(empty($nama_barang) || empty($kuantitas)) {
		header("Location: edit-data.php?id=$id");
		echo '<script>alert("Input data terlebih dahulu")</script>';
	} else {

	$query = "UPDATE daftar_barang SET nama_barang='$nama_barang',kuantitas='$kuantitas',created_by='$created_by' WHERE id='$id' and created_by='$created_by'";

	$data = mysqli_query($conn, $query);

	if ($data > 0) {
		header("Location: dashboard.php");
	} else {
		echo '<script>alert("Edit data gagal")</script>';
	}
}

?>