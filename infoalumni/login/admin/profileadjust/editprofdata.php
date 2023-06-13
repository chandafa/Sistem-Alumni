<?php
include '../../koneksi.php';
session_start();
if($_SESSION['status']!="sudah_login"){
	header("location:../../login.php");
	die;
}elseif($_SESSION['level']!="admin"){
  header("location:../../user/index.php");
  die;
}
    $id = $_GET["id"];
	$query = "SELECT * FROM users where id='$id'";
	$result = mysqli_query($koneksi, $query);
	$data = mysqli_fetch_assoc($result);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ubah Data Profil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../daftar/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../daftar/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../daftar/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../daftar/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../daftar/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../daftar/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../daftar/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../daftar/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../daftar/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../daftar/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(batik.png);">
				<!--Image provided by Freepik, created by myriammira-->
					<span class="login100-form-title-1">
						Ubah Data Profil
					</span>
					<?php if(isset($_GET['pesan'])){?>
						<p><?php echo $pesan; ?></p>
					<?php } ?>
				</div>

				<form class="login100-form validate-form" action="update.php" method="POST">
				<input name="id" value="<?php echo $data['id'];?>" hidden/>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" value="<?php echo $data['username'];?>" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="regis" class="login100-form-btn">
							Save Changes
						</button>
						<a class="login100-form-btn" style="margin-left:5px;" href="authlevels.php">Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="../../daftar/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../daftar/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../daftar/vendor/bootstrap/js/popper.js"></script>
	<script src="../../daftar/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../daftar/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../daftar/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../daftar/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../daftar/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../daftar/js/main.js"></script>

</body>
</html>