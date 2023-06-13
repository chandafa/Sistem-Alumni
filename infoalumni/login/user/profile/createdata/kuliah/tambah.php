<?php
session_start();
include('../../../../koneksi.php');
define('DirKul', TRUE);
include 'tambah_user.php';
if ($_SESSION['status'] != "sudah_login") {
    header("location:../login.php");
    die;
}
if ($_SESSION['level'] != "user") {
    header("location:../login.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Request Data Kuliah</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../../../../admin/crud/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../../../admin/crud/css/main.css">
<!--===============================================================================================-->
<script src="../../../css/js/livepreview.js"></script>
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" enctype="multipart/form-data" method="POST">
				<span class="contact100-form-title">
					Request Data Kuliah
				</span>

				<div class="wrap-input100 validate-input" data-validate="Ketik namamu bambang!">
					<span class="label-input100">Nama</span>
					<input class="input100" type="text" name="nama" placeholder="Masukkan namamu!">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Jenis kelamin dibutuhkan!">
					<span class="label-input100">Jenis Kelamin</span>
					<div>
					<select class="selection-2" name="gender">
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Masukkan nama universitas!">
                    <span class="label-input100">Nama Universitas</span>
                    <input class="input100" type="text" name="namauniver" placeholder="Masukkan nama universitas!">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Masukkan jurusan!">
                    <span class="label-input100">Jurusan</span>
                    <input class="input100" type="text" name="jurusan" placeholder="Masukkan jurusanmu!">
					<span class="focus-input100"></span>
				</div>
                
                <img id="preview" src="" alt="" width="320px"/>

                <div class="wrap-input100">
					<span class="label-input100">Foto Profil</span><br>
					<input type="file" name="gambar" accept="image/*" onchange="showLive(this,'preview')" />
					<span class="focus-input100"></span>
				</div>
				<input type="hidden" name="permissions" value="1" />
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<?php 
						$statuspers = mysqli_query($koneksi, "SELECT * FROM users where nama='$_SESSION[nama]'");
						$datastats = mysqli_fetch_assoc($statuspers);
						if($datastats['permissions'] != 1) { ?>
						<button class="contact100-form-btn" type="submit" name="submit">
							<span>
								Request
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
						<?php } ?>
					</div>
				</div>
				<?php if($datastats['permissions'] == 1){ ?>
						<span>
							You already requested a things. <a href="../../profile.php">See Here.</a>
						</span>
						<?php } ?>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
				<a href="../../profile.php" class="contact100-form-btn">Kembali</a>
				</div>
				</div>
			</form>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="../../../../admin/crud/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../../../admin/crud/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../../../admin/crud/vendor/bootstrap/js/popper.js"></script>
	<script src="../../../../admin/crud/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../../../admin/crud/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="../../../../admin/crud/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../../../admin/crud/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../../../admin/crud/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../../../admin/crud/js/main.js"></script>
	<script src="../../../../admin/crudkul/js/val.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="../../../../admin/crud/css/googlemanager.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>