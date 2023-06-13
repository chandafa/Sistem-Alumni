<?php
if(!defined('DirProf')){
    die('Direct Access is not permitted');
}
if($_SESSION['status']!="sudah_login"){
    header("location:../login.php");
    die;
}
if(isset($_POST['profchange'])){
    
$id = $_POST['id'];
$nama = $_POST['nama'];
$user = $_POST['username'];
$pass = $_POST['password'];
$hashed = password_hash($pass, PASSWORD_DEFAULT);

$checkreq = mysqli_query($koneksi, "SELECT * FROM request WHERE requested_by='$_SESSION[nama]'");
    if(mysqli_num_rows($checkreq) > 0){
        mysqli_query($koneksi, "UPDATE request SET requested_by='$nama' WHERE requested_by='$_SESSION[nama]'");
    }
$checkedit = mysqli_query($koneksi, "SELECT * FROM requestedit WHERE request_by='$_SESSION[nama]'");
    if(mysqli_num_rows($checkedit) > 0){
        mysqli_query($koneksi, "UPDATE requestedit SET request_by='$nama' WHERE request_by='$_SESSION[nama]'");
    }
    $query = "SELECT * FROM users where username='$user'";
    $querykon = mysqli_num_rows(mysqli_query($koneksi,$query));
    $query2 = "SELECT * FROM users where nama='$nama'";
    $querykon2 = mysqli_num_rows(mysqli_query($koneksi,$query2));
    if($querykon > 0){
        echo '<meta http-equiv="refresh" content="1;url=profile.php?pesan=Maaf, Username sudah diambil!" />';
        die;
    }
    if($querykon2 > 0){
        echo '<meta http-equiv="refresh" content="1;url=profile.php?pesan=Maaf, Nama yang anda ketik sudah diambil!" />';
        die;
    }
mysqli_query($koneksi,"UPDATE users SET nama = '$nama', username = '$user', password = '$hashed' where id='$id'");
header("location:../../logout.php");
}
?>