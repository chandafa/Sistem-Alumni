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
if(!isset($_GET['id'])){
    echo '<a href="https://instagram.com/al_nv23">Report Here</a><br>';
    die('Go-To Hell Shit. Anyway if you find any other bugs. reports it right away!');
}
$id = $_GET["id"];
$querydel = "SELECT * FROM usaha WHERE id='$id'";
$konquery = mysqli_query($koneksi, $querydel);
$runhapus =  mysqli_fetch_array($konquery);
$gambar = $runhapus['gambar'];
if($gambar != ""){
unlink("gambar/$runhapus[gambar]");
}
    $query = "DELETE FROM usaha WHERE id='$id'";
    $hasil_query = mysqli_query($koneksi, $query);
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      header("location:../usaha.php?pesan=Data berhasil dihapus.");
    }