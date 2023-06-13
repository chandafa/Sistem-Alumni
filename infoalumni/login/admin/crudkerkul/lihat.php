<?php
include '../../koneksi.php';
session_start();
if($_SESSION['status']!="sudah_login"){
    header("location:../../login.php");
}

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM kerjakuliah where id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
   }
   $data = mysqli_fetch_assoc($result);
      if (!count($data)) {
         echo "<script>alert('Data tidak ditemukan pada database');window.location='../kerjakuliah.php';</script>";
      }
 } else {
   echo "<script>alert('Masukkan data id.');window.location='../kerjakuliah.php';</script>";
 }         
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <title>Lihat Gambar</title>
 <link rel="stylesheet" href="../crud/vendors/bootstrap/css/bootstrap.min.css">
 </head>
 <body>
 <img style="margin-left:1%;margin-top:1%;" src="gambar/<?php echo $data['gambar']; ?>">
 <br><br>
 <a style="margin-left:3%;" class="btn btn-primary" href="../kerjakuliah.php">Balik ke home</a>
 </body>
 </html>