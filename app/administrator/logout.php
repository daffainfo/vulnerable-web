<?php

	session_start();

	session_unset();

	session_destroy();

	header("Location: index.php?redirect=dashboard.php&pesan=logout")
?>