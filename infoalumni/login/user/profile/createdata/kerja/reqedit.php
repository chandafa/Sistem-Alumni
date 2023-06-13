<?php
include '../../../../koneksi.php';
session_start();
define('EdKerja', TRUE);
include 'requestedit.php';
if ($_SESSION['status'] != "sudah_login") {
    header("location:../login.php");
    die;
}
if ($_SESSION['level'] != "user") {
    header("location:../login.php");
    die;
}

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM kerja where id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
   }
   $data = mysqli_fetch_assoc($result);
      if (!count($data)) {
         echo "<script>alert('Data tidak ditemukan pada database');window.location='../../../index.php';</script>";
      }
 } else {
   echo "<script>alert('Masukkan data id.');window.location='../../../index.php;</script>";
 }         
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Data Kerja</title>
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
            <input name="idrequest" value="<?php echo $data['id']; ?>"  hidden />
				<span class="contact100-form-title">
					Edit Data Kerja
				</span>

				<div class="wrap-input100">
					<span class="label-input100">Nama</span>
					<input class="input100" type="text" name="nama" value="<?php echo $data['nama'];?>" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Jenis Kelamin</span>
					<div>
					<select class="selection-2" name="gender">
						<option value="Pria"<?php if($data['jenis_kelamin'] == 'Pria'): ?> selected="selected"<?php endif;?>>Pria</option>
						<option value="Wanita"<?php if($data['jenis_kelamin'] == 'Wanita'): ?> selected="selected"<?php endif;?>>Wanita</option>
					</select>
					</div>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100">
                    <span class="label-input100">Nama Perusahaan</span>
                    <input class="input100" type="text" name="namaperusahaan" value="<?php echo $data['nama_perusahaan'];?>" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100">
                    <span class="label-input100">Jabatan</span>
                    <input class="input100" type="text" name="jabatan" value="<?php echo $data['jabatan'];?>" required>
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100">
					<span class="label-input100">Kapan kamu berkerja?</span><br>
					<input class="input100" type="number" min="1900" max="2099" step="1" value="<?php echo $data['tahun_kerja'];?>" name="tahun" required/>
					<span class="focus-input100"></span>
                </div>
                
                <img id="preview" src="../../../../admin/crud/gambar/<?php echo $data['gambar']; ?>" alt="" width="320px"/>

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
							Edit is not possible. <a href="../../profile.php">See Here.</a>
						</span>
						<?php } ?>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
				<a href="../../../index.php" class="contact100-form-btn">Kembali</a>
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