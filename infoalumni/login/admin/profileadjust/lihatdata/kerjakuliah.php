<?php
include '../../../koneksi.php';
session_start();
if($_SESSION['status']!="sudah_login"){
    header("location:../../login.php");
    die;
}elseif($_SESSION['level']!="admin"){
  header("location:../../user/index.php");
  die;
}
if(isset($_GET['tipe'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM requestedit where id='$id'";
  $query2 = "SELECT * FROM request where id='$id'";
  $result = mysqli_query($koneksi, $query);
  if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
      " - ".mysqli_error($koneksi));
 }

 $data = mysqli_fetch_assoc($result);
} else{
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM request where id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
   }
   $data = mysqli_fetch_assoc($result);
  }
}     
 ?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Lihat Data | Kerja & Kuliah</title>
      <link rel="stylesheet" href="bootstrap.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
      <div class="container align-items-center">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <p>Photo: (Jika ada)</p>
                <?php if($data['gambar'] != ""){ ?>
                <img src="../../crudkerkul/gambar/<?php echo $data['gambar'];?>" alt="tidak ada foto." style="width:200px;height:195px;">
                <?php } ?>
              </div>
              <div class="col-6 col-md-4">
                <p class="alert alert-warning">Jenis Tabel: Kerja dan Kuliah</p>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-6">
                <p class="alert alert-primary">Nama: <?php echo $data['nama'];?></p>
              </div>
              <div class="col-6">
                <p class="alert alert-primary">Jenis Kelamin: <?php echo $data['jenis_kelamin']; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p class="alert alert-primary">Nama Perusahaan: <?php echo $data['nama_perusahaan'];?></p>
              </div>
              <div class="col-6">
                <p class="alert alert-primary">Jabatan: <?php echo $data['jabatan'];?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p class="alert alert-primary">Tahun Kerja: <?php echo $data['tahun_kerja'];?></p>
              </div>
              <div class="col-6">
                <p class="alert alert-primary">Nama Universitas: <?php echo $data['nama_univer'];?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p class="alert alert-primary">Jurusan: <?php echo $data['jurusan'];?></p>
              </div>
            </div>
            <a class="btn btn-primary" href="../approval.php">Kembali</a>
          </div>
        </div>
      </div>
    </body>
  </html>