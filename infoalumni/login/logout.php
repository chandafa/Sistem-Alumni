<?php 
session_start();
session_destroy();
header("location:login.php?pesan=Anda sudah keluar!");
?>