<?php
define('DirRegBlock', TRUE);
require_once('../koneksi.php');
include 'daftar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register User | SisInfoAlumni</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/2021.jpg);">
					<span class="login100-form-title-1">
						Register User
					</span>
					<?php if(isset($_GET['pesan'])) {  ?>
			<label style="position:absolute;color:red;margin-top:120px;margin-left:15px;"><?php echo htmlspecialchars($_GET['pesan']); ?></label>
			<?php } ?>
				</div>

				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required" >
						<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" placeholder="Enter username" maxlength="30">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="nama" placeholder="Enter name" maxlength="30">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" maxlength="56">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password Confirmation is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="passwordconfirm" placeholder="Re-Enter password" maxlength="56">
						<span class="focus-input100"></span>
					</div>

					<div class="g-recaptcha" data-sitekey="6LchHhoaAAAAALHlGQeRrlYv_hdIJAwqVakyvVnh"></div><br>

					<div class="flex-sb-m w-full p-b-30">
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="regis" class="login100-form-btn">
							Register User
						</button>
						<a class="login100-form-btn" style="margin-left:5px;" href="../../index.php">Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>