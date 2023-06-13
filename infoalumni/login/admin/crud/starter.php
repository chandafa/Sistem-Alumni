<?php
session_start();
include '../../koneksi.php';
if($_SESSION['status']!="sudah_login"){
    header("location:../../login.php");
}
if($_SESSION['level']!="admin"){
    header("location../../user/index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
<style>
            @page { size: landscape; }

            .logo {
                width: 40px;
                height: 40px;
            }
</style>