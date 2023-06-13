<?php
include '../login/koneksi.php';
$pass = 'admin';
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($koneksi,"DELETE FROM users WHERE username='admin'");
    mysqli_query($koneksi, "INSERT INTO users (id,nama,username,password,level,permissions) values ('1','Sang Admin','admin','$hashed','admin',null)");
echo 'admin recovered successfully!';
echo '<meta http-equiv="refresh" content="1;../index.php">';
?>