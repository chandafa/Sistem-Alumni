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
$id = $_GET['id'];
$jenistable = $_GET['jenistable'];
if($jenistable == 'kerja'){
    header("location:lihatdata/kerja.php?id=$id&tipe=edit");
}
if($jenistable == 'kuliah'){
    header("location:lihatdata/kuliah.php?id=$id&tipe=edit");
}
if($jenistable == 'kerjakuliah'){
    header("location:lihatdata/kerjakuliah.php?id=$id&tipe=edit");
}
if($jenistable == 'mencari_kerja'){
    header("location:lihatdata/mencrkrj.php?id=$id&tipe=edit");
}
if($jenistable == 'usaha'){
    header("location:lihatdata/usaha.php?id=$id&tipe=edit");
}
else {
    echo '<meta http-equiv="refresh" content="3; url=approval.php">';
    echo '<p>Jenis tabel tidak valid. Redirect kembali...</p>';
}