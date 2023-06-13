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
if(!isset($_POST['submit'])){
    echo '<a href="https://instagram.com/al_nv23">Report Here</a><br>';
    die('Go-To Hell Shit. Anyway if you find any other bugs. reports it right away!');
}

$id = (int)$_POST['id'];
$nama_mahsis = $_POST['nama'];
$jenis_kelamin = $_POST['gender'];
$nama_univer = $_POST['namauniver'];
$jurusan = $_POST['jurusan'];
$gambar = $_FILES['gambar']['name'];

if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.',$gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        $query1 = "SELECT * FROM kuliah where id='$id'";
        $konquery = mysqli_query($koneksi,$query1);
        $runhapus =  mysqli_fetch_array($konquery);
        unlink("gambar/$runhapus[gambar]");
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        $query = "UPDATE kuliah SET nama = '$nama_mahsis', jenis_kelamin = '$jenis_kelamin', uni_ver = '$nama_univer', jurusan = '$jurusan', gambar = '$nama_gambar_baru'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        if(!$result) {
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
        } else {
            header("location:../kuliah.php?pesan=Data berhasil ditambah.");
        }
    } else {
        header("location:../kuliah.php?pesan=Ekstensi yang diperbolehkan hanya PNG dan JPG");
    }
} else {
    $query = $query = "UPDATE kuliah SET nama = '$nama_mahsis', jenis_kelamin = '$jenis_kelamin', uni_ver = '$nama_univer', jurusan = '$jurusan'";
    $query .= "WHERE id ='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result) {
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    } else {
     header("location:../kuliah.php?pesan=Data berhasil ditambah.");
        }
}
?>