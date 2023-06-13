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
if(!isset($_GET['id'])){
  echo '<a href="https://instagram.com/al_nv23">Report Here</a><br>';
  die('Go-To Hell Shit. Anyway if you find any other bugs. reports it right away!');
}
$data2 = mysqli_query($koneksi,"SELECT * FROM requestedit");
$row = mysqli_fetch_array($data2);
if(empty($row['nama'])){
   header("location:approval.php?pesan=TIDAK ADA DATA. LIHAT?");
}
$data = mysqli_query($koneksi,"SELECT * FROM requestedit");
$del = $_GET['id'];
while($log = mysqli_fetch_array($data)) {
  $jenistable = $log['jenis_table'];
  if($del == "2903482"){
    if($jenistable == "kerja"){
      unlink("../crud/gambar/$log[gambar]");
      }
      if($jenistable == "kuliah"){
        unlink("../crudkul/gambar/$log[gambar]");
      }
      if($jenistable == "kerjakuliah"){
        unlink("../crudkerkul/gambar/$log[gambar]");
      }
      if($jenistable == "mencari_kerja"){
        unlink("../crudmencrkrj/gambar/$log[gambar]");
      }
      if($jenistable == "usaha"){
        unlink("../crudusaha/gambar/$log[gambar]");
      }
    $query = "DELETE FROM requestedit";
      $hasil_query = mysqli_query($koneksi, $query);
      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
      } else {
        header("location:approval.php?pesan=Permintaan berhasil ditolak."); 
        die;
      }
      $nameuser = $log['request_by'];
      mysqli_query($koneksi,"UPDATE users SET permissions='0' where nama='$nameuser'");
  }else {
    $querydel = "SELECT * FROM requestedit WHERE id='$del'";
    $konquery = mysqli_query($koneksi, $querydel);
    $runhapus =  mysqli_fetch_array($konquery);
    $tablename = $runhapus['jenis_table'];
    $gambar = $runhapus['gambar'];
    if($gambar != ""){
    if($tablename == "kerja"){
      unlink("../crud/gambar/$runhapus[gambar]");
    }
    if($tablename == "usaha"){
      unlink("../crudusaha/gambar/$runhapus[gambar]");
    }
    if($tablename == "kuliah"){
      unlink("../crudkuliah/gambar/$runhapus[gambar]");
    }
    if($tablename == "mencari_kerja"){
      unlink("../crudmencrkrj/gambar/$runhapus[gambar]");
    }
    if($tablename == "kerjakuliah"){
      unlink("../crudkerkul/gambar/$runhapus[gambar]");
    }
  }
$query = "DELETE FROM requestedit WHERE id='$del'";
    $hasil_query = mysqli_query($koneksi, $query);
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      header("location:approval.php?pesan=Permintaan berhasil ditolak.");
      die;
    }
    $nameuser2 = $log['request_by'];
    mysqli_query($koneksi,"UPDATE users SET permissions='0' where nama='$nameuser2'");
  }
}
?>