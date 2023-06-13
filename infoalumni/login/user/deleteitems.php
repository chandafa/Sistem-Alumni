<?php
include '../koneksi.php';
session_start();
if($_SESSION['status']!="sudah_login"){
    header("location:../login.php");
    die;
}
if ($_SESSION['level'] != "user") {
  header("location:../login.php");
  die;
}
$timeout = 60;

$timeout = $timeout * 60;
if(isset($_SESSION['start_session'])){
  $elapsed_time = time()-$_SESSION['start_session'];
  if($elapsed_time >= $timeout){
    header("location:../logout.php");
  }
}
$_SESSION['start_session']=time();
$backward = $_GET['from'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/css/bootstrap.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<title>Request Delete Data</title>
</head>
<body>
<div class="container" style="display: flex; justify-content: center; align-items: center;height:100vh;">
<!--style="display: flex; justify-content: center; align-items: center; height: 100vh"-->
<h2>In order to delete a data your requested,<br>Please contact admin!</h2>
<p>&nbsp;</p>
<a href="https://instagram.com/al_nv23" target="_blank" class="btn btn-success"><i class="fab fa-instagram"></i></a>
<p>&nbsp;</p>
<a href="https://discord.gg/xXXVn3F2Yp" target="_blank" class="btn btn-info"><i class="fab fa-discord"></i></a>
</div>
<div style="position:absolute;margin-top:-5vh;margin-left:3vh;">
<a href="../user/<?php echo htmlspecialchars($backward)?>" class="btn btn-primary"><i class="fas fa-backward"></i> Back</a>
</div>
</div>
</body>
</html>