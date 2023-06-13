<?php
if(!defined('DirRegBlock')){
    die('Direct Access is not permitted.');
}

if(isset($_POST['regis']))
{
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
    $password_confirm = mysqli_real_escape_string($koneksi,$_POST['passwordconfirm']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT * FROM users where username='$username'";
    $querykon = mysqli_num_rows(mysqli_query($koneksi,$query));
    $query2 = "SELECT * FROM users where nama='$nama'";
    $querykon2 = mysqli_num_rows(mysqli_query($koneksi,$query2));
    if($querykon > 0){
        echo '<meta http-equiv="refresh" content="1;url=register.php?pesan=Maaf, Username sudah diambil!" />';
        die;
    }
    if($querykon2 > 0){
        echo '<meta http-equiv="refresh" content="1;url=register.php?pesan=Maaf, Nama yang anda ketik sudah diambil!" />';
        die;
    }
    if(empty($username) || empty($nama) || empty($password))
    {
        echo 'Isi dong';
    }if ($password !== $password_confirm) {
        echo '<meta http-equiv="refresh" content="1;url=register.php?pesan=password dan konfirmasi tidak sama." />';
        die;
    }
        $pass=$hashed_password;
        $sql = "INSERT INTO users (nama,username,password,level) values ('$nama','$username','$pass','newuser')";
        $result = mysqli_query($koneksi,$sql);
        if($result)
        {
            header("location:../login.php");
        } else {
            echo 'data gagal disimpan!';
        }
        die;
}
if(isset($_POST['regisforadmin']))
{
    session_start();
    if(empty($_SESSION['level'])){
        die('Error Occurred.');
    }
    if($_SESSION['level'] != 'admin'){
        die('Error Occurred.');
    }
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
    $password_confirm = mysqli_real_escape_string($koneksi,$_POST['passwordconfirm']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT * FROM users where username='$username'";
    $querykon = mysqli_num_rows(mysqli_query($koneksi,$query));
    $query2 = "SELECT * FROM users where nama='$nama'";
    $querykon2 = mysqli_num_rows(mysqli_query($koneksi,$query2));
    if($querykon > 0){
        echo '<meta http-equiv="refresh" content="1;url=register.php?pesan=Maaf, Username sudah diambil!" />';
        die;
    }
    if($querykon2 > 0){
        echo '<meta http-equiv="refresh" content="1;url=register.php?pesan=Maaf, Nama yang anda ketik sudah diambil!" />';
        die;
    }
    if(empty($username) || empty($nama) || empty($password))
    {
        echo 'Isi dong';
    }if ($password !== $password_confirm) {
        echo '<meta http-equiv="refresh" content="1;url=register.php?pesan=password dan konfirmasi tidak sama." />';
        die;
    }
        $pass=$hashed_password;
        $sql = "INSERT INTO users (nama,username,password,level) values ('$nama','$username','$pass','newuser')";
        $result = mysqli_query($koneksi,$sql);
        if($result)
        {
            header("location:authlevels.php");
        } else {
            echo 'data gagal disimpan!';
        }
        die;
}
?>