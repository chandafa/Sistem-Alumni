<?php
if(!defined('EdKerKul')){
    die('Direct Access Not Permitted.');
}
if(isset($_POST['submit'])){


$id_request = (int)$_POST['idrequest'];
$nama_kerkul = $_POST['nama'];
$jenis_kelamin = $_POST['gender'];
$nama_perusahaan = $_POST['namaperusahaan'];
$jabatan = $_POST['jabatan'];
$tahun_kerja = $_POST['tahun'];
$nama_univer = $_POST['namauniver'];
$jurusan = $_POST['jurusan'];
$gambar = $_FILES['gambar']['name'];
$pers = $_POST['permissions'];
$nameuser = $_SESSION['nama'];

$validation = mysqli_query($koneksi, "SELECT * FROM users where nama='$nameuser'");
$dataval = mysqli_fetch_assoc($validation);
$access = $dataval['permissions'];
if($access == "1"){
    header("location:../../profile.php?pesan=Access Denied.");
}
if(empty($access)){
if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.',$gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../../../../admin/crudkerkul/gambar/'.$nama_gambar_baru);
            $query = "INSERT INTO requestedit (id_request,jenis_table,nama,jenis_kelamin,nama_perusahaan,jabatan,tahun_kerja,nama_univer,jurusan,request_by,gambar) values ('$id_request','kerjakuliah','$nama_kerkul','$jenis_kelamin','$nama_perusahaan',
            '$jabatan','$tahun_kerja','$nama_univer','$jurusan','$nameuser','$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            } else {
                mysqli_query($koneksi,"UPDATE users SET permissions = '$pers' where nama='$nameuser'");
                header("location:../../profile.php?pesan=Permintaan berhasil diproses.");
            }
        } else {
            mysqli_query($koneksi,"UPDATE users SET permissions = '0' where nama='$nameuser'");
            header("location:../../profile.php?pesan=Format yang diperbolehkan hanya PNG dan JPEG");
        }
    } else {
        $query =  "INSERT INTO requestedit (id_request,jenis_table,nama,jenis_kelamin,nama_perusahaan,jabatan,tahun_kerja,nama_univer,jurusan,request_by,gambar) values ('$id_request','kerjakuliah','$nama_kerkul','$jenis_kelamin','$nama_perusahaan',
        '$jabatan','$tahun_kerja','$nama_univer','$jurusan','$nameuser',null)";
        $result = mysqli_query($koneksi, $query);
        if(!$result) {
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
        } else {
            mysqli_query($koneksi,"UPDATE users SET permissions = '$pers' where nama='$nameuser'");
            header("location:../../profile.php?pesan=Permintaan berhasil diproses.");
        }
    }
}
}
?>