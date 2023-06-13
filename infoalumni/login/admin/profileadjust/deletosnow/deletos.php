<?php
include '../../../koneksi.php';
session_start();
if($_SESSION['status']!="sudah_login"){
    header("location:../login.php");
    die;
}elseif($_SESSION['level']!="admin"){
  header("location:../user/index.php");
    die;
}
if(!isset($_POST['submit'])){
    die;
}
$validate = 'Confirm Reset Data';
$writeuser = $_POST['confirm'];

if($validate == $writeuser){
    mysqli_query($koneksi, "TRUNCATE TABLE kerja");
    $files1 = glob('../../crud/gambar/*');
    foreach($files1 as $file1) {
        unlink($file1);
    }
    mysqli_query($koneksi, "TRUNCATE TABLE kerjakuliah");
    $files2 = glob('../../crudkerkul/gambar/*');
    foreach($files2 as $file2) {
        unlink($file2);
    }
    mysqli_query($koneksi, "TRUNCATE TABLE kuliah");
    $files3 = glob('../../crudkul/gambar/*');
    foreach($files3 as $file3) {
        unlink($file3);
    }
    mysqli_query($koneksi, "TRUNCATE TABLE mencari_kerja");
    $files4 = glob('../../crudmencrkrj/gambar/*');
    foreach($files4 as $file4) {
        unlink($file4);
    }
    mysqli_query($koneksi, "TRUNCATE TABLE usaha");
    $files4 = glob('../../crudusaha/gambar/*');
    foreach($files4 as $file4) {
        unlink($file4);
    }
    mysqli_query($koneksi, "TRUNCATE TABLE request");
    mysqli_query($koneksi, "TRUNCATE TABLE requestedit");
    mysqli_query($koneksi, "TRUNCATE TABLE users");
    $pass = 'admin';
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "INSERT INTO users (id,nama,username,password,level,permissions) values ('1','Sang Admin','admin','$hashed','admin',null)");
    header("location:hymmofdeleteall.php?pesan=All Data deleted.&logout=true");
} else {
    header("location:hymmofdeleteall.php?pesan=Confirmation false.");
    die;
}
?>