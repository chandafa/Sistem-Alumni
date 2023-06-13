<?php
define('DirBlock', TRUE);
include 'logincontroller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | SisInfoAlumni</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.preloader {
				position: fixed;
				top: 0;
				left: 0;
				bottom:0;
				right:0;
				width: 100%;
				height: 100vh;
				z-index: 99999999;
				background-image: url('images/loading.gif');
				background-repeat: no-repeat;
				background-color: #FFF;
				background-position: center;
			}
			#stop-scrolling {
				height: 100% !important;
				overflow: hidden !important;
			}
	</style>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/iconn.png"/>
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
<body id="stop-scrolling">
	<div class="preloader"></div>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/login-bg.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Login Alumni
					
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Masukkan Nisn">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Masukkan Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
					<?php if(isset($_GET['pesan'])) {  ?>
						<label style="position:absolute;color:red;margin-top:50px;margin-left:15px;"><?php echo htmlspecialchars($_GET['pesan']); ?></label>
					<?php } ?>
						<button class="login100-form-btn" type="submit" name="login">
							Masuk
						</button>
						<a class="login100-form-btn" style="margin-left:20px;" href="../index.php">Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script>
			function preloaderFadeOutInit(){
				$('.preloader').fadeOut('slow');
				$('body').attr('id','');
				}
				// Window load function
				jQuery(window).on('load', function () {
				(function ($) {
				preloaderFadeOutInit();
				})(jQuery);
				});
	</script>
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