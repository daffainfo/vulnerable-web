<?php
	session_start();

	include '../config.php';

	if($_SESSION["status_login_user"] != "true") {
		header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
	}

	$namabarang = $_POST['nama_barang'];
	$kuantitas = $_POST['kuantitas'];
	$username = $_SESSION["username_user"];
	$namabarang = mysqli_real_escape_string($conn, $namabarang);
	$kuantitas = mysqli_real_escape_string($conn, $kuantitas);

	if(empty($namabarang) || empty($kuantitas)) {
		header("Location: tambah-data.php?pesan=empty_form");
	} else {

	$query = "INSERT INTO daftar_barang (nama_barang,kuantitas,created_by) VALUES ('$namabarang','$kuantitas','$username')";
	$data = mysqli_query($conn, $query);

	if ($data > 0) {
		echo '<script>alert("Input data berhasil")</script>';
		header("Location: dashboard.php");
	} else {
		echo '<script>alert("Input data gagal")</script>';
		// header("Location: tambah_data.php");
	}
}

?>