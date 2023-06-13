<?php
if(!defined('DirBlock')){
    die('Direct Access is not permitted.');
}
session_start();
include 'koneksi.php';
if(isset($_POST['login'])){

$username = mysqli_real_escape_string($koneksi,$_POST['username']);
$password = mysqli_real_escape_string($koneksi,$_POST['password']);

$result = mysqli_query($koneksi, "SELECT * FROM users where username='$username'");
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
    if(password_verify($password, $row['password'])){
    if($row['level']=="admin"){
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = "sudah_login";
    $_SESSION['id_login'] = $row['id'];
    $_SESSION['level'] = "admin";
    header("location:admin/index.php");
}   
if($row['level']=="newuser"){
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = "sudah_login";
    $_SESSION['id_login'] = $row['id'];
    $_SESSION['level'] = "newuser";
    header("location:user/newuser.php");
}
    if($row['level']=="user"){
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = "sudah_login";
    $_SESSION['id_login'] = $row['id'];
    $_SESSION['level'] = "user";
    header("location:user/index.php");
    }
}else{
    header("location:login.php?pesan=Data user tidak ditemukan.");
}
}
}else{
    header("location:login.php?pesan=Data user tidak ditemukan.");
}
}
?>