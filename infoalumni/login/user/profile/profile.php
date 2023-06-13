<?php
session_start();
include('../../koneksi.php');
define('DirProf', TRUE);
include 'editprof.php';
include 'createdata/hapusreq.php';
include 'createdata/hapusreqed.php';

if ($_SESSION['status'] != "sudah_login") {
    header("location:../login.php");
    die;
}
if ($_SESSION['level'] != "user") {
    header("location:../login.php");
    die;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Profile Settings</title>
        <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
        <ul class="nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="discord.php" class="nav-link">Discuss</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">Back to Home</a>
                </li>
            </ul>
          </nav>
          <div class="card">
          <div class="card-header">
          <?php echo $_SESSION['nama']; ?>
          </div>
              <div class="card-body">
                  <h3 class="card-title">Manage Profile</h3>
                  <div class="containter">
                    <p class="card-text">Ubah Profil</p>
                    <div class="row row-cols-2">
                        <div class="col">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id_login'];?>" />
                                <div class="form-group">
                                    <label>Nama:</label>
                                    <input class="form-control" type="text" name="nama" required/>
                                </div>                    
                        </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input class="form-control" type="text" name="username" required/>
                                </div>
                            </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input class="form-control" type="password" name="password" required/>
                                    </div>
                                    <input class="btn btn-primary" type="submit" name="profchange" value="SIMPAN" />
                                    </form>
                                </div>
                                <div class="col">
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Partisipasi
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="createdata/kerja/adduser.php">Kerja</a>
                                                <a class="dropdown-item" href="createdata/kerjakuliah/tambah.php">Kerja dan Kuliah</a>
                                                <a class="dropdown-item" href="createdata/kuliah/tambah.php">Kuliah</a>
                                                <a class="dropdown-item" href="createdata/mencrkrj/tambah.php">Mencari Kerja</a>
                                                <a class="dropdown-item" href="createdata/usaha/tambah.php">Usaha</a>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                  </div>
               </div>
          </div>
          <?php if(isset($_GET['pesan'])) {  ?>
          <div class="container align-items-center">
          <div class="alert alert-primary" role="alert">
            <?php echo htmlspecialchars($_GET['pesan']); ?>
            </div>
        </div>
        <?php } ?>
          <?php 
          $querykan = mysqli_query($koneksi,"SELECT * FROM request where requested_by='$_SESSION[nama]'");
          while($reqlist = mysqli_fetch_assoc($querykan)) { ?>
        <div class="container align-items-center">
            <div class="card">
                <div class="card-header">
                    Your Request List
                </div>
                <div class="card-body">
                    <table class="table">
                        <theead>
                            <tr>
                                <th>Nama:</th>
                                <th>Jenis Table:</th>
                                <th>Aksi:</th>
                            </tr>
                        </theead>
                        <tbody>
                            <td><?php echo $reqlist['nama'];?></td>
                            <td><?php echo $reqlist['jenis_table'];?></td>
                            <td>
                            <form method="POST">
                            <input hidden name="id" value="<?php echo $reqlist['id'];?>" />
                            <button class="btn btn-danger" type="submit" name="confirmdel">Cancel Request</button>
                            </form>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php 
          $querykan2 = mysqli_query($koneksi,"SELECT * FROM requestedit where request_by='$_SESSION[nama]'");
          while($reqlist2 = mysqli_fetch_assoc($querykan2)) { ?>
        <div class="container align-items-center">
            <div class="card">
                <div class="card-header">
                    Your Request List
                </div>
                <div class="card-body">
                    <table class="table">
                        <theead>
                            <tr>
                                <th>Nama:</th>
                                <th>Jenis Table:</th>
                                <th>Aksi:</th>
                            </tr>
                        </theead>
                        <tbody>
                            <td><?php echo $reqlist2['nama'];?></td>
                            <td><?php echo $reqlist2['jenis_table'];?></td>
                            <td>
                            <form method="POST">
                            <input hidden name="id" value="<?php echo $reqlist2['id'];?>" />
                            <button class="btn btn-danger" type="submit" name="deleteedit">Cancel Request</button>
                            </form>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
    </body>
    <script type="text/javascript" src="../css/js/popper.min.js"></script>
    <script type="text/javascript" src="../css/js/jquery.js"></script>
    <script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
</html>