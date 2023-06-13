<?php
include '../../koneksi.php';
session_start();
if($_SESSION['status']!="sudah_login"){
    header("location:../../login.php");
    die;
}
if($_SESSION['level']!="admin"){
    header("location:../../user/index.php");
    die;
}
if(!isset($_POST['submit'])){
    echo '<a href="https://instagram.com/al_nv23">Report Here</a><br>';
    die('Go-To Hell Shit. Anyway if you find any other bugs. reports it right away!');
} else{
$id = $_POST['id'];
$nama = $_POST['nama'];
$user = $_POST['username'];
$pass = $_POST['password'];
$hashed = password_hash($pass, PASSWORD_DEFAULT);
$query1 = "SELECT * FROM users where username='$user'";
$querykon = mysqli_num_rows(mysqli_query($koneksi,$query1));
$query2 = "SELECT * FROM users where nama='$nama'";
$querykon2 = mysqli_num_rows(mysqli_query($koneksi,$query2));
if($querykon > 0){
    echo '<meta http-equiv="refresh" content="1;url=../index.php?pesan=Maaf, Username sudah diambil!" />';
    die;
}
if($querykon2 > 0){
    echo '<meta http-equiv="refresh" content="1;url=../index.php?pesan=Maaf, Nama yang anda ketik sudah diambil!" />';
    die;
}

mysqli_query($koneksi,"UPDATE users SET nama = '$nama', username = '$user', password = '$hashed' where id='$id'");
echo "<script>alert('Profil berhasil diperbarui');window.location='profile.php';</script>";
header("location:../../logout.php");
}
?>