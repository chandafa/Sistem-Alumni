<?php
include '../../koneksi.php';
$id = $_POST['id'];
if(isset($_POST['approve'])){
    mysqli_query($koneksi, "UPDATE users SET level='user' where id='$id'");
    header("location:authlevels.php?pesan=User berhasil disetujui.");
    die();
}
if(!isset($_POST['submit'])){
    echo '<a href="https://instagram.com/al_nv23">Report Here</a><br>';
    die('Go-To Hell Shit. Anyway if you find any other bugs. reports it right away!');
}else{
    $level = $_POST['leveling'];
mysqli_query($koneksi,"UPDATE users SET level = '$level' where id='$id'");
header("location:authlevels.php?pesan=Profil berhasil diperbarui.");
}
?>