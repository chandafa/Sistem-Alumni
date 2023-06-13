<?php
if(!defined('DirProf')){
  die('Direct access not permitted.');
}
if(isset($_POST['deleteedit'])){

$data = mysqli_query($koneksi,"SELECT * FROM requestedit");
$del = $_POST['id'];
while($log = mysqli_fetch_array($data)) {
  $jenistable = $log['jenis_table'];
    $querydel = "SELECT * FROM requestedit WHERE id='$del'";
    $konquery = mysqli_query($koneksi, $querydel);
    $runhapus =  mysqli_fetch_array($konquery);
    $tablename = $runhapus['jenis_table'];
    $gambar = $runhapus['gambar'];
    if($gambar != ""){
    if($tablename == "kerja"){
      unlink("../../admin/crud/gambar/$runhapus[gambar]");
    }
    if($tablename == "usaha"){
      unlink("../../admin/crudusaha/gambar/$runhapus[gambar]");
    }
    if($tablename == "kuliah"){
      unlink("../../admin/crudkuliah/gambar/$runhapus[gambar]");
    }
    if($tablename == "mencari_kerja"){
      unlink("../../admin/crudmencrkrj/gambar/$runhapus[gambar]");
    }
    if($tablename == "kerjakuliah"){
      unlink("../../admin/crudkerkul/gambar/$runhapus[gambar]");
    }
  }
$query = "DELETE FROM requestedit WHERE id='$del'";
    $hasil_query = mysqli_query($koneksi, $query);
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      header("location:profile.php?pesan=Permintaan berhasil dihapus.");
    }
  }
$userid = $_SESSION['id_login'];
$enbpers = mysqli_query($koneksi, "UPDATE users SET permissions='0' where id='$userid'");
}
?>