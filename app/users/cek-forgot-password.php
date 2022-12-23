<?php
	session_start();

	include '../config.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';

	if(isset($_POST['email'])){

		$email = $_POST['email'];

		$email = mysqli_real_escape_string($conn, $email);

		$query = "SELECT * FROM user WHERE email = '$email'";

		$data = mysqli_query($conn, $query);

		$mail = new PHPMailer();
		$mail->IsSMTP();

		$str = rand();
		$result = sha1($str);

		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth   = TRUE;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.gmail.com";
		$mail->Username   = getenv("env_email");
		$mail->Password   = getenv("env_password");

		$mail->IsHTML(true);
		$mail->AddAddress($_POST['email'], "Daffa");
		$mail->SetFrom(getenv("env_email"), "Admin Login Password");
		$mail->Subject = "Password Reset Link";
		$content = "<p>Here is your password reset token</p><p>http://" . $_SERVER['HTTP_HOST'] . "/reset/password/" . $result;
		$mail->MsgHTML($content);

		if ($data > 0 && $mail->Send()) {
			header("Location: forgot-password.php?pesan=lupa_password_berhasil");
		} else {
			header("Location: forgot-password.php?pesan=gagal");
		}
	} else {
		echo "Error";
	}
?>